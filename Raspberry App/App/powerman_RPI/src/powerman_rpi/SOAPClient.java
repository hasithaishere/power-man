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
import java.sql.ResultSet;
import javax.xml.soap.*;
import javax.xml.transform.*;
import javax.xml.transform.dom.DOMResult;
import javax.xml.transform.stream.*;
import org.json.JSONObject;
import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.NodeList;

public class SOAPClient {

    /**
     * Starting point for the SAAJ - SOAP Client Testing
     */
    public static void main(String args[]) {
        try {
            // Create SOAP Connection
            //SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
            //SOAPConnection soapConnection = soapConnectionFactory.createConnection();

            // Send SOAP Message to SOAP Server
            //String url = "http://localhost:81/wsdl/s2.php";
            //String url = "http://localhost:81/powerman_server/push_data.php";
        //createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a");
            
            //SOAPMessage soapResponse = soapConnection.call(req, url);

            // Process the SOAP Response
            //printSOAPResponse(soapResponse);
            
          
	/*Document doc = toDocument(soapResponse);
        
            try {
                    System.out.println("");
                    System.out.println(doc.getElementsByTagName("return").item(0).getTextContent());

                    NodeList list = doc.getElementsByTagName("*");
                    System.out.println("XML Elements: ");
                    for (int i=0; i<list.getLength(); i++) {
                    // Get element
                    Element element = (Element)list.item(i);
                    System.out.println(element.getNodeName()); 
                    System.out.println("First Name : " + element.getElementsByTagName("return").item(0).getTextContent());
                }
            } catch (Exception e) {
           }*/
            //soapConnection.close();
        } catch (Exception e) {
            System.err.println("Error occurred while sending SOAP Request to Server");
            e.printStackTrace();
        }
    }

    //---------------------------------PUSH DATA TO WEB SERVER------------------------------------
    
    private static void createSOAPRequest_pushData(DBConnector db_con) throws Exception {
        
        ResultSet rs = db_con.search("SELECT DISTINCT token FROM power_send_out WHERE send_status = '0'");
        
        JSONObject jobj_1 = new JSONObject();
        JSONObject jobj_md = new JSONObject();
        
        int temp_device_id = 0;
        
        while(rs.next())
        {
            String temp_token = rs.getString("token").toString();
            
            int temp_MDP_con = 0;
            
            JSONObject jobj2 = new JSONObject();
            
            ResultSet rs_2 = db_con.search("SELECT device_id,total_pcon,log_on,mainDevice_Id FROM power_send_out WHERE token = '" + temp_token + "'");
            
            String tmp_md_id = "";
            String tmp_log_on = "";
            
            while(rs_2.next())
            {
                jobj2.put("device_id", rs_2.getString("device_id"));
                jobj2.put("total_pcon", rs_2.getString("total_pcon"));
                
                tmp_log_on = rs_2.getString("log_on");
                
                jobj2.put("log_on", tmp_log_on);
                
                tmp_md_id = rs_2.getString("mainDevice_Id");
                
                jobj2.put("mainDevice_Id", tmp_md_id);
                
                temp_MDP_con += Integer.parseInt(rs_2.getString("total_pcon"));
            }
            
            jobj_md.put("md_id", tmp_md_id);
            jobj_md.put("md_logon", tmp_log_on);
            jobj_md.put("mdp_con", temp_MDP_con);
            
            jobj_1.put(String.valueOf(temp_device_id),jobj2);
            
            temp_device_id ++;           
            
                        
        }
        
        String sd_data = jobj_1.toString();
        String md_data = jobj_md.toString();
        
        String code = "45436574tgdfg5e";
        
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
        soapBodyElem1.addTextNode(sd_data);
        SOAPElement soapBodyElem2 = soapBodyElem.addChildElement("md_data", "ws");
        soapBodyElem2.addTextNode(md_data);
        SOAPElement soapBodyElem3 = soapBodyElem.addChildElement("code", "ws");
        soapBodyElem3.addTextNode(code);

        MimeHeaders headers = soapMessage.getMimeHeaders();
        headers.addHeader("SOAPAction", serverURI  + "push_data");

        soapMessage.saveChanges();

        /* Print the request message */
        System.out.print("Request SOAP Message = ");
        soapMessage.writeTo(System.out);
        System.out.println();

        SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
        SOAPConnection soapConnection = soapConnectionFactory.createConnection();

        // Send SOAP Message to SOAP Server
        //String url = "http://localhost:81/wsdl/s2.php";
        String url = "http://localhost:81/powerman_server/push_data.php";
        //SOAPMessage req = (createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a"));
            
        SOAPMessage soapResponse = soapConnection.call(soapMessage, url);

        // Process the SOAP Response
        printSOAPResponse(soapResponse);
        soapConnection.close();
    }
    
    //-------------------------------END - PUSH DATA------------------------------------------
    
    
    //------------------------------GET SIGNAL FROM WEB SERVER-----------------------------------
    
    private static void createSOAPRequest_getSignal(DBConnector db_con) throws Exception {
        MessageFactory messageFactory = MessageFactory.newInstance();
        SOAPMessage soapMessage = messageFactory.createMessage();
        SOAPPart soapPart = soapMessage.getSOAPPart();

        String serverURI = "http://ws.cdyne.com/";

        // SOAP Envelope
        SOAPEnvelope envelope = soapPart.getEnvelope();
        envelope.addNamespaceDeclaration("ws", serverURI);

        String code = "dfas43245rr";
        
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
        System.out.print("Request SOAP Message = ");
        soapMessage.writeTo(System.out);
        System.out.println();

        SOAPConnectionFactory soapConnectionFactory = SOAPConnectionFactory.newInstance();
        SOAPConnection soapConnection = soapConnectionFactory.createConnection();

        // Send SOAP Message to SOAP Server
        //String url = "http://localhost:81/wsdl/s2.php";
        String url = "http://localhost:81/powerman_server/get_signal.php";
        //SOAPMessage req = (createSOAPRequest_pushData("dev123","432fdefw4ewfdvczx","4324fedfsdf","6f78079088bd1bbc06cc277af294951a"));
            
        SOAPMessage soapResponse = soapConnection.call(soapMessage, url);

        // Process the SOAP Response
        printSOAPResponse(soapResponse);
        soapConnection.close();
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
   
}
