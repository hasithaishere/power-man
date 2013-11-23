/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.IOException;
import java.io.StringReader;
import java.util.Random;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.text.Document;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathConstants;
import javax.xml.xpath.XPathExpression;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import org.jdom.JDOMException;
import org.jdom.input.SAXBuilder;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;

/**
 *
 * @author Domore
 */
public class xml_code {
    
    private static Error_logging elog = new Error_logging();
    
    public void generate_sql(String xml, DBConnector db_con) throws XPathExpressionException, ParserConfigurationException, SAXException, IOException {
        
        //String xml = "<message>HELLO!</message>";
        //String xml = "<frm><mac>0004A3CCC9F9</mac><devid>SES001</devid><date>2013-08-29 05:28:25</date><version>1.1.0</version><ack><id_1>48575E6E</id_1><pow_1>1.825kw</pow_1><temp_1>---</temp_1><state_1>on</state_1></ack><ack><id_2>1A247C62</id_2><pow_2>---</pow_2><temp_2>---</temp_2><state_2>fixed</state_2></ack><ack><id_3>51731376</id_3><pow_3>---</pow_3><temp_3>---</temp_3><state_3>fixed</state_3></ack><ack><id_4>--</id_4><pow_4></pow_4><temp_4></temp_4><state_4>fixed</state_4></ack><ack><id_5>--</id_5><pow_5></pow_5><temp_5></temp_5><state_5>fixed</state_5></ack><ack><id_6>--</id_6><pow_6></pow_6><temp_6></temp_6><state_6>fixed</state_6></ack><ack><id_7>--</id_7><pow_7></pow_7><temp_7></temp_7><state_7>fixed</state_7></ack><ack><id_8>--</id_8><pow_8></pow_8><temp_8></temp_8><state_8>fixed</state_8></ack><ack><id_9>--</id_9><pow_9></pow_9><temp_9></temp_9><state_9>fixed</state_9></ack><ack><id_10>--</id_10><pow_10></pow_10><temp_10></temp_10><state_10>fixed</state_10></ack></frm>";
        //org.jdom.input.SAXBuilder saxBuilder = new SAXBuilder();
        //try {
          //  org.jdom.Document doc = saxBuilder.build(new StringReader(xml));
            //String message = doc.getRootElement().getText();
            //System.out.println(message);
        //} catch (JDOMException e) {
            // handle JDOMException
        //} catch (IOException e) {
            // handle IOException
        //}
        /*
        XPathFactory xpathFactory = XPathFactory.newInstance();
        XPath xpath = xpathFactory.newXPath();
        
        InputSource source1 = new InputSource(new StringReader(xml));
        InputSource source2 = new InputSource(new StringReader(xml));

        String msg = xpath.evaluate("/frm/mac", source1);

        System.out.println(msg);
        System.out.println(xpath.evaluate("/frm/devid", source2));*/
        
        try 
        {
            InputSource source = new InputSource(new StringReader(xml));

            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbf.newDocumentBuilder();
            org.w3c.dom.Document document = db.parse(source);

            XPathFactory xpathFactory = XPathFactory.newInstance();
            XPath xpath = xpathFactory.newXPath();

            String log_on = xpath.evaluate("/frm/date", document);
            String mac = xpath.evaluate("/frm/mac", document);
            String main_device_id = xpath.evaluate("/frm/devid", document);

            //System.out.println("msg=" + msg + ";" + "status=" + status);

            //------------------------
            String query1 = "INSERT INTO power_device_powerlog (pcon,log_on,device_id,mac) VALUES ";
            String query2 = "INSERT INTO power_subdevice_powerlog (device_id,pcon,temp,control_status,log_on,token,mainDevice_id) VALUES ";

            //---Query - Ignore New Sub Device Conflict ---
            
            String query3_0 = "INSERT IGNORE INTO power_subdevice_control (device_id, mainDevice_id) VALUES ";
            
            //---------------------------------------------
            
            //---Query(UPDATE)----
            String query3 = "UPDATE power_subdevice_control SET control_on = '" + log_on + "', mainDevice_id = '" + main_device_id + "', control_status = CASE device_id";
            String query3_p2 = " pcon = CASE device_id";
            String query3_p3 = "WHERE device_id IN (";
            String query3_p4 = "seq = CASE device_id";
            //--------------------

            int i =1;
            int main_pcon = 0;
            int control_sense = 0;
            String temp_token = RandomBuilder();

            while(i<=10)
            {                      
                //System.out.println(xpath.evaluate("/frm/ack/id_"+i, document));
                //System.out.println(xpath.evaluate("/frm/ack/pow_"+i, document));
                //System.out.println(xpath.evaluate("/frm/ack/temp_"+i, document));
                //System.out.println(xpath.evaluate("/frm/ack/state_"+i, document));

                int tmp_cs = 0;          

                if(!xpath.evaluate("/frm/ack/id_"+i, document).equals("--"))
                {
                    if(!xpath.evaluate("/frm/ack/state_"+i, document).equals("fixed"))
                    {
                        if(xpath.evaluate("/frm/ack/state_"+i, document).equals("on"))
                        {
                            tmp_cs = 1;
                        }
                        else
                        {
                            if(!xpath.evaluate("/frm/ack/state_"+i, document).equals("off"))
                            {
                                tmp_cs = 0;
                            }
                        }
                    }
                    else
                    {
                        tmp_cs = 3;
                    }

                    int tmp_dpc = 0;

                    query3_p4 += " WHEN '" + xpath.evaluate("/frm/ack/id_"+i, document) + "' THEN '" + i + "'";

                    if(!xpath.evaluate("/frm/ack/pow_"+i, document).equals("---"))
                    {
                        if(xpath.evaluate("/frm/ack/pow_"+i, document).contains("kw"))
                        {
                            tmp_dpc = (int) (Double.parseDouble(xpath.evaluate("/frm/ack/pow_"+i, document).replaceAll("kw", "")) * 1000);
                        }
                        else
                        {
                            if(xpath.evaluate("/frm/ack/pow_"+i, document).contains("w"))
                            {
                                tmp_dpc = (int) Double.parseDouble(xpath.evaluate("/frm/ack/pow_"+i, document).replaceAll("w", ""));
                            }
                        }
                        main_pcon += tmp_dpc;

                        query3_p2 += " WHEN '" + xpath.evaluate("/frm/ack/id_"+i, document) + "' THEN '" + tmp_dpc + "' ";
                        control_sense = 1;
                    }

                    int tmp_temp;

                    if(xpath.evaluate("/frm/ack/temp_"+i, document).equals("---"))
                    {
                        tmp_temp = 0;
                    }
                    else
                    {
                        tmp_temp = (int) Double.parseDouble(xpath.evaluate("/frm/ack/temp_"+i, document));
                    }

                    query2 += "('" + xpath.evaluate("/frm/ack/id_"+i, document) + "','" + tmp_dpc + "','" + tmp_temp + "','" + tmp_cs + "','" + log_on + "','" + temp_token + "','" + main_device_id + "'),";
                    query3 += " WHEN '" + xpath.evaluate("/frm/ack/id_"+i, document) + "' THEN '" + tmp_cs + "'";
                    query3_p3 += "'" + xpath.evaluate("/frm/ack/id_"+i, document) + "',";

                    query3_0 += "('"+ xpath.evaluate("/frm/ack/id_"+i, document) + "','" + main_device_id + "'),";

                    //System.out.println("++++++++");
                }

                i++;
            }


            query1 += "('"+ main_pcon + "','" + log_on + "','" + main_device_id + "','" + mac + "')";
            query2 = query2.substring(0, query2.length()-1); 
            
            query3_0 = query3_0.substring(0, query3_0.length()-1); 
            
            query3 += " END,";
            query3_p2 += "END, ";
            query3_p3 = query3_p3.substring(0, query3_p3.length()-1)+")";
            query3_p4 += " ELSE seq END ";

            if(control_sense == 0)
            {
                query3_p2 = " ";
            }

            query3 = query3 + query3_p2 + query3_p4 + query3_p3;
            //System.out.println(query3);
            //------- Start Execute Query-------

            db_con.change(query1);
            db_con.change(query2);
            db_con.change(query3_0);
            db_con.change(query3);

            //--------- End Execute Query-------

            //System.out.println("-----------------------");
            //System.out.println(query1);
            //System.out.println(query2);
            //System.out.println(query3);
            //System.out.println(query2);
            //System.out.println("-----------------------");
            //------------------------      

            /*List songElements = doc.getRootElement().getChildren("song");

            for(int i = 1 ; i <= songElements.size() ; i++) {
               Element songElement = (Element) songElements.get(i);
               String name = songElement.getAttributeValue("name");
               String path = songElement.getAttributeValue("path");
               String album = songElement.getAttributeValue("album");
            }*/

        } 
        catch (Exception e) 
        {
            elog.save_log("XML Response Errors : " + e);
        }
        
        
        
    }
    
    public String RandomBuilder() 
    {
        char[] chars = "abcdefghijklmnopqrstuvwxyz1234567890".toCharArray();
        StringBuilder sb = new StringBuilder();
        Random random = new Random();
        for (int i = 0; i < 5; i++) {
            char c = chars[random.nextInt(chars.length)];
            sb.append(c);
        }
        return sb.toString();
    }
    
}
