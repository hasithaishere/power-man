/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.net.HttpURLConnection;
import java.net.URL;
import java.sql.ResultSet;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Hasitha
 */
public class HTTPRequest {
    
    public static Error_logging elog = new Error_logging();
    
    public static void controlDevice(DBConnector db_con) throws Exception {
        
        try 
        {
            
            Boolean breaker = true;
            int skipper = 0;
            
            ResultSet rs1  =  db_con.search("SELECT id,mainDevice_id,device_id,control_status FROM power_control_log WHERE check_status = '0'");
            
            while(rs1.next())
            {
                ResultSet rs2 = db_con.search("SELECT ip FROM power_device_map WHERE device_id = '"+ rs1.getString("mainDevice_id") +"'");
                
                String device_ip = "";
                
                while(rs2.next())
                {
                    device_ip = rs2.getString("ip");
                }
                
                ResultSet rs3 = db_con.search("SELECT seq FROM power_subdevice_control WHERE mainDevice_id = '"+ rs1.getString("mainDevice_id") +"' AND device_id = '"+ rs1.getString("device_id") +"'");
                
                String device_seq = "";
                
                while(rs3.next())
                {
                    device_seq = rs3.getString("seq");
                }
                
                String tmp_cstatus = "0";
                
                String tmp_cs = rs1.getString("control_status");
                
                if(tmp_cs.equals("0"))
                {
                    tmp_cstatus = "off";
                }
                else
                {
                    if(tmp_cs.equals("1"))
                    {
                        tmp_cstatus = "on";
                    }
                }
                
                while(breaker)
                {

                    String USER_AGENT = "Mozilla/5.0";
                    
                    String url = "http://" + device_ip + "/setsocket.xml?num=" + device_seq + "&set=" + tmp_cstatus + "&ran=" + generateRandom();
                    URL obj = new URL(url);
                    HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                    // optional default is GET
                    con.setRequestMethod("GET");
                    //add request header
                    con.setRequestProperty("User-Agent", USER_AGENT);
                    int responseCode = con.getResponseCode();
                    System.out.println("\nSending 'GET' request to URL : " + url);
                    System.out.println("Response Code : " + responseCode);

                    if(responseCode == 200)
                    {
                        breaker = false;
                        db_con.change("UPDATE power_control_log SET check_status = '1' WHERE id = '"+ rs1.getString("id") +"'");
                    }
                    skipper++;

                    if(skipper == 3)
                    {
                        breaker = false;
                    }

                }
            }
                
        } catch (Exception e) {
            elog.save_log("HTTPR-controlDevice-Connection Lost:" + e.toString());
        }

    }
    
    public static void scheduleDevice(DBConnector db_con) throws Exception {
        
        try 
        {
            
            Boolean breaker = true;
            int skipper = 0;
            
            ResultSet rs1  =  db_con.search("SELECT id,mainDevice_id,device_id,control_status FROM `power_schedule_log` WHERE DATE(schedule_on) <= DATE(NOW()) AND check_status = '0'");
            
            while(rs1.next())
            {
                ResultSet rs2 = db_con.search("SELECT ip FROM power_device_map WHERE device_id = '"+ rs1.getString("mainDevice_id") +"'");
                
                String device_ip = "";
                
                while(rs2.next())
                {
                    device_ip = rs2.getString("ip");
                }
                
                ResultSet rs3 = db_con.search("SELECT seq FROM power_subdevice_control WHERE mainDevice_id = '"+ rs1.getString("mainDevice_id") +"' AND device_id = '"+ rs1.getString("device_id") +"'");
                
                String device_seq = "";
                
                while(rs3.next())
                {
                    device_seq = rs3.getString("seq");
                }
                
                String tmp_cstatus = "0";
                String tmp_cs = rs1.getString("control_status");
                
                if(tmp_cs.equals("0"))
                {
                    tmp_cstatus = "off";
                }
                else
                {
                    if(tmp_cs.equals("1"))
                    {
                        tmp_cstatus = "on";
                    }
                }
                
                while(breaker)
                {

                    String USER_AGENT = "Mozilla/5.0";
                    
                    String url = "http://" + device_ip + "/setsocket.xml?num=" + device_seq + "&set=" + tmp_cstatus + "&ran=" + generateRandom();
                    URL obj = new URL(url);
                    HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                    // optional default is GET
                    con.setRequestMethod("GET");
                    //add request header
                    con.setRequestProperty("User-Agent", USER_AGENT);
                    int responseCode = con.getResponseCode();
                    System.out.println("\nSending 'GET' request to URL : " + url);
                    System.out.println("Response Code : " + responseCode);

                    if(responseCode == 200)
                    {
                        breaker = false;
                        db_con.change("UPDATE power_schedule_log SET check_status = '1' WHERE id = '"+ rs1.getString("id") +"'");
                    }
                    skipper++;

                    if(skipper == 3)
                    {
                        breaker = false;
                    }

                }
            }
                
        } catch (Exception e) {
            elog.save_log("HTTPR-scheduleDevice-Connection Lost:" + e.toString());
        }

    }
    
    public static void pairDevice(DBConnector db_con) throws Exception {
        
        try 
        {
            
            Boolean breaker = true;
            int skipper = 0;
            
            ResultSet rs1  =  db_con.search("SELECT id,mainDevice_id,device_id,pair_status FROM power_pair_log WHERE check_status = '0'");
            
            while(rs1.next())
            {
                System.out.println(rs1.getString("mainDevice_id"));
                ResultSet rs2 = db_con.search("SELECT ip FROM power_device_map WHERE device_id = '"+ rs1.getString("mainDevice_id") +"'");
                
                String device_ip = "";
                
                while(rs2.next())
                {
                    device_ip = rs2.getString("ip");
                }
                
                //0 >> for unpair // 1 >> for pair device
                //Please update the links after adding
                String url = "";
                String tmp_ps  = rs1.getString("pair_status");
                
                ResultSet rs3 = db_con.search("SELECT seq FROM power_subdevice_control WHERE mainDevice_id = '"+ rs1.getString("mainDevice_id") +"' AND device_id = '"+ rs1.getString("device_id") +"'");
                
                    String device_seq = "";
                    
                    while(rs3.next())
                    {
                        device_seq = rs3.getString("seq");
                    }
                
                if(tmp_ps.equals("0"))
                {   
                    url = "http://" + device_ip + "/deletesonser.xml?num=" + device_seq + "&ran=" + generateRandom();
                }
                else
                {
                    if(tmp_ps.equals("1"))
                    {
                        url = "http://" + device_ip + "/addsonser.xml?num=" + device_seq + "&rad=" + generateRandom();
                    }
                }
                
                while(breaker)
                {

                    String USER_AGENT = "Mozilla/5.0";

                    URL obj = new URL("http://pmlite.hp/ack_signel.php");
                    HttpURLConnection con = (HttpURLConnection) obj.openConnection();
                    // optional default is GET
                    con.setRequestMethod("GET");
                    //add request header
                    con.setRequestProperty("User-Agent", USER_AGENT);
                    int responseCode = con.getResponseCode();
                    System.out.println("\nSending 'GET' request to URL : " + url);
                    System.out.println("Response Code : " + responseCode);

                    if(responseCode == 200)
                    {
                        breaker = false;
                        db_con.change("UPDATE power_pair_log SET check_status = '1' WHERE id = '"+ rs1.getString("id") +"'");
                    }
                    skipper++;

                    if(skipper == 3)
                    {
                        breaker = false;
                    }

                }
            }
                
        } catch (Exception e) {
            elog.save_log("HTTPR-pairDevice-Connection Lost:" + e.toString());
        }

    }

    private static String generateRandom()
    {
        String val = "1988";
        
        try 
        {
            Random generator = new Random();
            val = String.valueOf(generator.nextInt(9000) + 1000);
        } 
        catch (Exception e) 
        {
            elog.save_log("HTTPR-generateRandom-Connection Lost:" + e.toString());
        }
        
        return val;
    }
    
    
    }
