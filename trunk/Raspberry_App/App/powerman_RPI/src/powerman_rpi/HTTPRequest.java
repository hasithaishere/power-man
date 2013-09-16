/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.net.HttpURLConnection;
import java.net.URL;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Hasitha
 */
public class HTTPRequest {
    
    public static void main(String[] args) throws Exception {
        
        new Thread(new Runnable() {

            @Override
            public void run() {
                while(true)
                {
                    try {
                        try {
                            sendGet();
                        } catch (Exception ex) {
                            Logger.getLogger(HTTPRequest.class.getName()).log(Level.SEVERE, null, ex);
                        }
                        Thread.sleep(1000);
                    } catch (InterruptedException ex) {
                        Logger.getLogger(HTTPRequest.class.getName()).log(Level.SEVERE, null, ex);
                    }
                }
            }
        }).start();
        
        
    }
    
    private static void sendGet() throws Exception {
        
        try {
            
            String USER_AGENT = "Mozilla/5.0";
        
            String url = "http://www.google.com/search?q=mkyong";
            URL obj = new URL(url);
            HttpURLConnection con = (HttpURLConnection) obj.openConnection();
            // optional default is GET
            con.setRequestMethod("GET");
            //add request header
            con.setRequestProperty("User-Agent", USER_AGENT);
            int responseCode = con.getResponseCode();
            System.out.println("\nSending 'GET' request to URL : " + url);
            System.out.println("Response Code : " + responseCode);
            
        } catch (Exception e) {
            System.out.println("Connection Lost.");
        }

    }
    }
