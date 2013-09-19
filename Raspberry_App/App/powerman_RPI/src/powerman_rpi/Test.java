/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.IOException;
import java.io.StringReader;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Iterator;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import org.json.JSONArray;
import org.json.JSONObject;
import org.xml.sax.InputSource;
import org.xml.sax.SAXException;

/**
 *
 * @author hasitha
 */
public class Test {
    public static void main(String[] args) throws ParserConfigurationException, SAXException, IOException, XPathExpressionException, ParseException {
        /*String xml = "<SOAP-ENV:Envelope SOAP-ENV:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\" xmlns:SOAP-ENV=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:SOAP-ENC=\"http://schemas.xmlsoap.org/soap/encoding/\">" +
"   <SOAP-ENV:Body>" +
"      <ns1:push_dataResponse xmlns:ns1=\"http://ws.cdyne.com/\">" +
"         <status xsi:type=\"xsd:string\">1</status>" +
"         <error_string xsi:type=\"xsd:string\"/>" +
"      </ns1:push_dataResponse>" +
"   </SOAP-ENV:Body>" +
"</SOAP-ENV:Envelope>";
        
        InputSource source = new InputSource(new StringReader(xml));

            DocumentBuilderFactory dbf = DocumentBuilderFactory.newInstance();
            DocumentBuilder db = dbf.newDocumentBuilder();
            org.w3c.dom.Document document = db.parse(source);

            XPathFactory xpathFactory = XPathFactory.newInstance();
            XPath xpath = xpathFactory.newXPath();

            String log_on = xpath.evaluate("/Envelope/Body/push_dataResponse/status", document);
            
            System.out.println(log_on);*/
        
        String js = "{\"val\":"+"[{\"maindevice_id\":\"0\",\"device_id\":\"457898\",\"control_status\":\"1\",\"schedule_on\":\"2013-09-17 09:31:36\"}]" + "}";
        /*
        JSONObject jobj1 = new JSONObject(js);
        JSONArray jarr1 = jobj1.getJSONArray("val");
        int i = 0;
        while(i<jarr1.length())
        {
            JSONObject jobj2 = jarr1.getJSONObject(i);
            
            Iterator<String> iter = jobj2.keys();
            
            while(iter.hasNext())
            {
                String key = iter.next();
                System.out.println(key + " => " +jobj2.get(key));
            }
            
            i++;
            
        }
        */SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
                    String current_time = sdf.format(new Date());
                    System.out.println(current_time);
        JSONObject jobj1 = new JSONObject(js);
                    JSONArray jarr1 = jobj1.getJSONArray("val");
                    
                    String c_signal_query = "INSERT INTO power_control_log (control_status,maindevice_id,device_id,log_on) VALUES ";
                    
                    int i = 0;
                    while(i<jarr1.length())
                    {
                        JSONObject jobj2 = jarr1.getJSONObject(i);
                        
                        String csq2 = "(";
                        
                        Iterator<String> iter = jobj2.keys();

                        while(iter.hasNext())
                        {
                            //String key = iter.next();
                            //System.out.println(key + " => " +jobj2.get(key));
                            csq2 += ("'" + (String) jobj2.get(iter.next()) + "',");
                        }
                        
                        csq2 = csq2.substring(0, csq2.length()-1);
                        csq2 += ",'" + current_time + "'),";
                        c_signal_query += csq2;
                        i++;
                    }
                    
                    c_signal_query = c_signal_query.substring(0, c_signal_query.length()-1);
                    
                    System.out.println(c_signal_query);
                    
                    
        
    }
}
