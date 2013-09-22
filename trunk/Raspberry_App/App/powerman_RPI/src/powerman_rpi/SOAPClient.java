package powerman_rpi;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Hasitha
 */
import java.io.IOException;
import java.io.StringReader;
import java.sql.ResultSet;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Iterator;
import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.soap.*;
import javax.xml.transform.*;
import javax.xml.transform.dom.DOMResult;
import javax.xml.transform.stream.*;
import javax.xml.xpath.XPath;
import javax.xml.xpath.XPathExpressionException;
import javax.xml.xpath.XPathFactory;
import org.json.JSONArray;
import org.json.JSONObject;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.NodeList;
import org.xml.sax.InputSource;

public class SOAPClient {

    private static Error_logging elog = new Error_logging();
    private static Con_config conf = new Con_config();
    /**
     * Starting point for the SAAJ - SOAP Client Testing
     */
    //---------------------------------PUSH DATA TO WEB SERVER------------------------------------
    
    public static void createSOAPRequest_pushData(DBConnector db_con) throws Exception {
        
        String ackr_query = "UPDATE power_send_out SET send_status='1' WHERE id IN (";
        
        ResultSet rs = db_con.search("SELECT DISTINCT token FROM power_send_out WHERE send_status = '0' ORDER BY id ASC");
        
        JSONObject jobj_1 = new JSONObject();
        JSONObject jobj_md = new JSONObject();
        
        int temp_device_id = 1;
        int subcount = 1; 
        
        while(rs.next())
        {
            String temp_token = rs.getString("token").toString();
            
            int temp_MDP_con = 0;
            
            JSONObject jobj_md2 = new JSONObject();
            
            ResultSet rs_2 = db_con.search("SELECT id,device_id,total_pcon,log_on,mainDevice_Id FROM power_send_out WHERE token = '" + temp_token + "'");
            
            String tmp_md_id = "";
            String tmp_log_on = "";
            
            while(rs_2.next())
            {
                JSONObject jobj2 = new JSONObject();
                
                jobj2.put("device_id", rs_2.getString("device_id"));
                jobj2.put("total_pcon", rs_2.getString("total_pcon"));
                
                tmp_log_on = rs_2.getString("log_on");
                jobj2.put("log_on", tmp_log_on);
                
                tmp_md_id = rs_2.getString("mainDevice_Id");
                
                jobj2.put("mainDevice_Id", tmp_md_id);
                
                temp_MDP_con += Integer.parseInt(rs_2.getString("total_pcon"));
                
                ackr_query += (rs_2.getString("id") + ",");
                
                jobj_1.put(String.valueOf(subcount),jobj2);
                
                subcount++;
            }
            
            jobj_md2.put("md_id", tmp_md_id);
            jobj_md2.put("md_logon", tmp_log_on);
            jobj_md2.put("mdp_con", temp_MDP_con);
            
            
            jobj_md.put(String.valueOf(temp_device_id),jobj_md2);
            
            temp_device_id ++;           
            
                        
        }
        
        ackr_query = ackr_query.substring(0, ackr_query.length()-1) + ")";
        //System.out.println(ackr_query);
        
        String sd_data = jobj_1.toString();
        String md_data = jobj_md.toString();
        
        //System.out.println(sd_data);
        //System.out.println(md_data);
        
        
        String code = conf.read_config(6);
        
        MessageFactory messageFactory = MessageFactory.newInstance();
        SOAPMessage soapMessage = messageFactory.createMessage();
        SOAPPart soapPart = soapMessage.getSOAPPart();

        String serverURI = "http://ws.cdyne.com/";

        // SOAP Envelope
        SOAPEnvelope envelope = soapPart.getEnvelope();
        envelope.addNamespaceDeclaration("ws", serverURI);

        /*
        Constructed SOAP Request Message:
        <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:example="http://ws.cdyne.com/">
            <SOAP-ENV:Header/>
            <SOAP-ENV:Body>
                <example:VerifyEmail>
                    <example:email>mutantninja@gmail.com</example:email>
                    <example:LicenseKey>123</example:LicenseKey>
                </example:VerifyEmail>
            </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>
         */
        
        // SOAP Body
        SOAPBody soapBody = envelope.getBody();
        SOAPElement soapBodyElem = soapBody.addChildElement("push_data", "ws");
        SOAPElement soapBodyElem1 = soapBodyElem.addChildElement("sd_data", "ws");
        
        if(sd_data.equals("{}"))
        {
            soapBodyElem1.addTextNode("");
        }
        else
        {
            soapBodyElem1.addTextNode(sd_data);
        }
                
        SOAPElement soapBodyElem2 = soapBodyElem.addChildElement("md_data", "ws");
        
        if(md_data.equals("{}"))
        {
            soapBodyElem2.addTextNode("");
        }
        else
        {
            soapBodyElem2.addTextNode(md_data);
        }
        
        SOAPElement soapBodyElem3 = soapBodyElem.addChildElement("code", "ws");
        soapBodyElem3.addTextNode(code);

        MimeHeaders headers = soapMessage.getMimeHeaders();
        headers.addHeader("SOAPAction", serverURI  + "push_data");

        soapMessage.saveChanges();

        /* Print the request message */
        //System.out.print("Request SOAP Message = ");
        //soapMessage.writeTo(System.out);
        //System.out.println();

        try 
        {
            SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
            SOAPConnection soapConnection = soapConnectionFactory.createConnection();

            // Send SOAP Message to SOAP Server
            //String url = "http://localhost:81/wsdl/s2.php";
            String url = conf.read_config(7);
            //SOAPMessage req = (createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a"));

            SOAPMessage soapResponse = soapConnection.call(soapMessage, url);

            // Process the SOAP Response
            //printSOAPResponse(soapResponse);
            
            String tmp_result = "0";
            
            try 
            {
                Document doc = toDocument(soapResponse);
                tmp_result = doc.getElementsByTagName("status").item(0).getTextContent();
            } 
            catch (Exception e) 
            {
                elog.save_log("XML Response Read Error : " + e);
            }

            if(tmp_result.equals("1"))
            {
                db_con.change(ackr_query);
            }
            
            soapConnection.close();
            
        }
        catch (Exception e) 
        {
            elog.save_log("SOAP Request Error (Push Data) : " + e);
        }
    }
    
    //-------------------------------END - PUSH DATA------------------------------------------
    
    
    //------------------------------GET SIGNAL FROM WEB SERVER-----------------------------------
    
    public static void createSOAPRequest_getSignal(DBConnector db_con) throws Exception {
        MessageFactory messageFactory = MessageFactory.newInstance();
        SOAPMessage soapMessage = messageFactory.createMessage();
        SOAPPart soapPart = soapMessage.getSOAPPart();

        String serverURI = "http://ws.cdyne.com/";
        
        // SOAP Envelope
        SOAPEnvelope envelope = soapPart.getEnvelope();
        envelope.addNamespaceDeclaration("ws", serverURI);

        String code = conf.read_config(6);
        
        /*
        Constructed SOAP Request Message:
        <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:example="http://ws.cdyne.com/">
            <SOAP-ENV:Header/>
            <SOAP-ENV:Body>
                <example:VerifyEmail>
                    <example:email>mutantninja@gmail.com</example:email>
                    <example:LicenseKey>123</example:LicenseKey>
                </example:VerifyEmail>
            </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>
         */
        
        ResultSet rs_2 = db_con.search("SELECT DISTINCT mainDevice_id FROM power_subdevice_powerlog");
         
        String device_id_list = "";
        
        while(rs_2.next())
        {
            device_id_list += (rs_2.getString("mainDevice_id") + ",");
        }
        
        device_id_list = device_id_list.substring(0, device_id_list.length()-1); 
        
        // SOAP Body
        SOAPBody soapBody = envelope.getBody();
        SOAPElement soapBodyElem = soapBody.addChildElement("get_signal", "ws");
        SOAPElement soapBodyElem1 = soapBodyElem.addChildElement("device_id", "ws");
        soapBodyElem1.addTextNode(device_id_list);
        SOAPElement soapBodyElem2 = soapBodyElem.addChildElement("code", "ws");
        soapBodyElem2.addTextNode(code);

        MimeHeaders headers = soapMessage.getMimeHeaders();
        headers.addHeader("SOAPAction", serverURI  + "get_signal");

        soapMessage.saveChanges();

        /* Print the request message */
        //System.out.print("Request SOAP Message = ");
        //soapMessage.writeTo(System.out);
        //System.out.println();

        try 
        {
            SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
            SOAPConnection soapConnection = soapConnectionFactory.createConnection();

            // Send SOAP Message to SOAP Server
            //String url = "http://localhost:81/wsdl/s2.php";
            String url = conf.read_config(8);
            //SOAPMessage req = (createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a"));

            SOAPMessage soapResponse = soapConnection.call(soapMessage, url);

            // Process the SOAP Response
            //printSOAPResponse(soapResponse);
            
            signeltoDb(soapResponse,db_con);
            
            soapConnection.close();
        }
        catch (Exception e) 
        {
            elog.save_log("SOAP Request Error (Get Signal) : " + e);
        }
    }

    //---------------------------END - GET SIGNAAL METHOD-------------------------------------
    
    /**
     * Method used to print the SOAP Response
     */
    private static void printSOAPResponse(SOAPMessage soapResponse) throws Exception {
        TransformerFactory transformerFactory = TransformerFactory.newInstance();
        Transformer transformer = transformerFactory.newTransformer();
        Source sourceContent = soapResponse.getSOAPPart().getContent();
        System.out.print("\nResponse SOAP Message = ");
        StreamResult result = new StreamResult(System.out);
        transformer.transform(sourceContent, result);
    }

    public static Document toDocument(SOAPMessage soapMsg) throws TransformerConfigurationException, TransformerException, SOAPException, IOException {  
        Source src = soapMsg.getSOAPPart().getContent();  
        TransformerFactory tf = TransformerFactory.newInstance();  
        Transformer transformer = tf.newTransformer();  
        DOMResult result = new DOMResult();  
        transformer.transform(src, result);  
        return (Document)result.getNode();  
  }  

    private static void signeltoDb(SOAPMessage soapResponse,DBConnector db_con) throws TransformerConfigurationException, XPathExpressionException, TransformerException {
        
        try 
        {
            
            XPathFactory xpathFactory = XPathFactory.newInstance();
            XPath xpath = xpathFactory.newXPath();

            org.w3c.dom.Document xml_doc = toDocument(soapResponse);
            
            Document doc = toDocument(soapResponse);
            
            if(doc.getElementsByTagName("active_req").item(0).getTextContent().equals("1"))
            {
                SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
                String current_time = sdf.format(new Date());
                
                if(doc.getElementsByTagName("c_status").item(0).getTextContent().equals("1"))
                {
                    String js = "{\"val\":"+ doc.getElementsByTagName("c_signal").item(0).getTextContent() + "}";
        
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
                    //System.out.println(c_signal_query);
                    db_con.change(c_signal_query);
                }
                
                if(doc.getElementsByTagName("p_status").item(0).getTextContent().equals("1"))
                {
                    String js = "{\"val\":"+ doc.getElementsByTagName("p_signal").item(0).getTextContent() + "}";
        
                    JSONObject jobj1 = new JSONObject(js);
                    JSONArray jarr1 = jobj1.getJSONArray("val");
                    
                    String p_signal_query = "INSERT INTO power_pair_log (pair_status,maindevice_id,device_id,log_on) VALUES ";
                    
                    int i = 0;
                    while(i<jarr1.length())
                    {
                        JSONObject jobj2 = jarr1.getJSONObject(i);
                        
                        String psq2 = "(";
                        
                        Iterator<String> iter = jobj2.keys();

                        while(iter.hasNext())
                        {
                            //String key = iter.next();
                            //System.out.println(key + " => " +jobj2.get(key));
                            psq2 += ("'" + (String) jobj2.get(iter.next()) + "',");
                        }
                        
                        psq2 = psq2.substring(0, psq2.length()-1);
                        psq2 += ",'" + current_time + "'),";
                        p_signal_query += psq2;
                        i++;
                    }
                    
                    p_signal_query = p_signal_query.substring(0, p_signal_query.length()-1);
                    //System.out.println(p_signal_query);
                    db_con.change(p_signal_query);
                }
                
                if(doc.getElementsByTagName("sc_status").item(0).getTextContent().equals("1"))
                {
                    String js = "{\"val\":"+ doc.getElementsByTagName("sc_signal").item(0).getTextContent() + "}";
        
                    JSONObject jobj1 = new JSONObject(js);
                    JSONArray jarr1 = jobj1.getJSONArray("val");
                    
                    String sc_signal_query = "INSERT INTO power_schedule_log (control_status,maindevice_id,device_id,schedule_on,log_on) VALUES ";
                    
                    int i = 0;
                    while(i<jarr1.length())
                    {
                        JSONObject jobj2 = jarr1.getJSONObject(i);
                        
                        String psq2 = "(";
                        
                        Iterator<String> iter = jobj2.keys();

                        while(iter.hasNext())
                        {
                            //String key = iter.next();
                            //System.out.println(key + " => " +jobj2.get(key));
                            psq2 += ("'" + (String) jobj2.get(iter.next()) + "',");
                        }
                        
                        psq2 = psq2.substring(0, psq2.length()-1);
                        psq2 += ",'" + current_time + "'),";
                        sc_signal_query += psq2;
                        i++;
                    }
                    
                    sc_signal_query = sc_signal_query.substring(0, sc_signal_query.length()-1);
                    //System.out.println(sc_signal_query);
                    db_con.change(sc_signal_query);
                }
                
                send_getsignalAck(doc.getElementsByTagName("uid_list").item(0).getTextContent(),db_con);                
                
            }
            
        }
        catch (Exception e) 
        {
            elog.save_log("signeltoDb - errors : " + e);
        }
  
        
    }

    private static void send_getsignalAck(String ack_ids, DBConnector db_con) throws SOAPException, IOException {
        
        MessageFactory messageFactory = MessageFactory.newInstance();
        SOAPMessage soapMessage = messageFactory.createMessage();
        SOAPPart soapPart = soapMessage.getSOAPPart();

        String serverURI = "http://ws.cdyne.com/";
        
        // SOAP Envelope
        SOAPEnvelope envelope = soapPart.getEnvelope();
        envelope.addNamespaceDeclaration("ws", serverURI);

        String code = conf.read_config(6);
        
        /*
        Constructed SOAP Request Message:
        <SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:example="http://ws.cdyne.com/">
            <SOAP-ENV:Header/>
            <SOAP-ENV:Body>
                <example:VerifyEmail>
                    <example:email>mutantninja@gmail.com</example:email>
                    <example:LicenseKey>123</example:LicenseKey>
                </example:VerifyEmail>
            </SOAP-ENV:Body>
        </SOAP-ENV:Envelope>
         */
        
        // SOAP Body
        SOAPBody soapBody = envelope.getBody();
        SOAPElement soapBodyElem = soapBody.addChildElement("ack_signal", "ws");
        SOAPElement soapBodyElem1 = soapBodyElem.addChildElement("ack_ids", "ws");
        soapBodyElem1.addTextNode(ack_ids);
        SOAPElement soapBodyElem2 = soapBodyElem.addChildElement("code", "ws");
        soapBodyElem2.addTextNode(code);

        MimeHeaders headers = soapMessage.getMimeHeaders();
        headers.addHeader("SOAPAction", serverURI  + "ack_signal");

        soapMessage.saveChanges();

        /* Print the request message */
        //System.out.print("Request SOAP Message = ");
        //soapMessage.writeTo(System.out);
        //System.out.println();

        try 
        {
            SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
            SOAPConnection soapConnection = soapConnectionFactory.createConnection();

            // Send SOAP Message to SOAP Server
            //String url = "http://localhost:81/wsdl/s2.php";
            String url = conf.read_config(9);
            //SOAPMessage req = (createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a"));

            SOAPMessage soapResponse = soapConnection.call(soapMessage, url);

            // Process the SOAP Response
            //printSOAPResponse(soapResponse);
            
            signeltoDb(soapResponse,db_con); 
            
            soapConnection.close();
        }
        catch (Exception e) 
        {
            elog.save_log("SOAP Request Error (Get Signal) : " + e);
        }
        
    }
   
}
