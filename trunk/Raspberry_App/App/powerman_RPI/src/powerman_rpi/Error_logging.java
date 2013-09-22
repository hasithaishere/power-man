/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
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
public class Error_logging {

    public static void save_log(String logData) {
        try 
        {
            Con_config conf = new Con_config();
            PrintWriter out = new PrintWriter(new BufferedWriter(new FileWriter(conf.read_config(5), true)));
            out.println(logData);
            out.close();
        } catch (IOException e) {
            System.out.println("Logging IO Error");
        }
    }
    
    
}
