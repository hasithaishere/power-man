/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
import static java.lang.Thread.sleep;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.Date;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Domore
 */
public class RequestCatcher {   
    
    public static void start() throws Exception {

    ServerSocket m_ServerSocket = new ServerSocket(50005);
    int id = 0;
    
    DBConnector db_con = new DBConnector();
    HTTPRequest httpr = new HTTPRequest();
    SOAPClient soapc = new SOAPClient();
    
    thread_pushData th_pd = new thread_pushData(db_con,soapc);
    th_pd.start();
    
    thread_getSignal th_gs = new thread_getSignal(db_con,soapc);
    th_gs.start();
    
    thread_excontrol th_exc = new thread_excontrol(db_con,httpr);
    th_exc.start(); 
    
    thread_exschedule th_exs = new thread_exschedule(db_con,httpr);
    th_exs.start();
    
    thread_expair th_exp = new thread_expair(db_con,httpr);
    th_exp.start();
    
    while (true) {
        
      Socket clientSocket = m_ServerSocket.accept();
      ClientServiceThread cliThread = new ClientServiceThread(clientSocket, id++);
      cliThread.start();
      
    }
  }
}

//------------------START OF LISTEN SOCK THREAD CLASS--------------------
class ClientServiceThread extends Thread {
  public static Error_logging elog = new Error_logging();
  Socket clientSocket;
  int clientID = -1;
  boolean running = true;
  xml_code xc = new xml_code();
  DBConnector db_con = new DBConnector();

  ClientServiceThread(Socket s, int i) {
    clientSocket = s;
    clientID = i;
  }

  public void run() {
    System.out.println("Accepted Client : ID - " + clientID + " : Address - " + clientSocket.getInetAddress().getHostName());
    try {
      BufferedReader   in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
      PrintWriter   out = new PrintWriter(new OutputStreamWriter(clientSocket.getOutputStream()));
      
      //int thread_id = 0;
      
      while (running) {
        String clientCommand = in.readLine();
        //System.out.println("Client Says :" + clientCommand);
        if (clientCommand.equalsIgnoreCase("quit")) {
          running = false;
          System.out.print("Stopping client thread for client : " + clientID);
        } else {
          out.println(clientCommand);
          out.flush();
        }
        
        //if(thread_id == 10)
        //{
            xc.generate_sql(clientCommand,db_con);
            //System.out.println("Client Says : time to refresh");
            //thread_id = 0;
        //}        
        //thread_id++;
      }
    } catch (Exception e) {
      elog.save_log("Request Catcher Socket Thread : " + e.toString());
    }
  }
}
//------------------END OF LISTEN SOCK THREAD CLASS--------------------


class thread_pushData extends Thread
{
    public static Error_logging elog = new Error_logging();
    DBConnector db_contemp;
    SOAPClient soapc_temp;
    
    public thread_pushData(DBConnector db_con,SOAPClient soapc)
    {
        db_contemp = db_con;
        soapc_temp = soapc;        
    }    
    
    public void run()
    {
        try {
            while(true)
            {
                //System.out.println("1");
                soapc_temp.createSOAPRequest_pushData(db_contemp);
                soapc_temp.clearDB(db_contemp);
                sleep(15000);
            }
        } 
        catch (Exception e) {
            elog.save_log("Request Catcher thread_pushData : " + e.toString());
        }
    }
}

class thread_getSignal extends Thread
{
    public static Error_logging elog = new Error_logging();
    DBConnector db_contemp;
    SOAPClient soapc_temp;
    
    public thread_getSignal(DBConnector db_con,SOAPClient soapc)
    {
        db_contemp = db_con;
        soapc_temp = soapc;
    }
    
    public void run()
    {
        try {
            while(true)
            {
                //System.out.println("2");
                soapc_temp.createSOAPRequest_getSignal(db_contemp);
                sleep(2000);
            }
        } 
        catch (Exception e) {
            elog.save_log("Request Catcher thread_getSignal : " + e.toString());
        }
    }
}

class thread_excontrol extends Thread
{
    public static Error_logging elog = new Error_logging();
    DBConnector db_contemp;
    HTTPRequest httpr_temp;
    
    public thread_excontrol(DBConnector db_con,HTTPRequest httpr)
    {
        db_contemp = db_con;
        httpr_temp = httpr;
    }
    
    public void run()
    {
        try {
            while(true)
            {
                //System.out.println("3");
                httpr_temp.controlDevice(db_contemp);
                sleep(1000);
            }
        } 
        catch (Exception e) {
            elog.save_log("Request Catcher thread_excontrol : " + e.toString());
        }
    }
}

class thread_exschedule extends Thread
{
    public static Error_logging elog = new Error_logging();
    DBConnector db_contemp;
    HTTPRequest httpr_temp;
    
    public thread_exschedule(DBConnector db_con,HTTPRequest httpr)
    {
        db_contemp = db_con;
        httpr_temp = httpr;
    }
    
    public void run()
    {
        try {
            while(true)
            {
                //System.out.println("4");
                httpr_temp.scheduleDevice(db_contemp);
                sleep(1000);
            }
        } 
        catch (Exception e) {
            elog.save_log("Request Catcher thread_exschedule : " + e.toString());
        }
    }
}

class thread_expair extends Thread
{
    public static Error_logging elog = new Error_logging();
    DBConnector db_contemp;
    HTTPRequest httpr_temp;
    
    public thread_expair(DBConnector db_con,HTTPRequest httpr)
    {
        db_contemp = db_con;
        httpr_temp = httpr;
    }
    
    public void run()
    {
        try 
        {
            while(true)
            {
                //System.out.println("5");
                httpr_temp.pairDevice(db_contemp);
                sleep(1000);
            }
        } 
        catch (Exception e) {
            elog.save_log("Request Catcher thread_expair : " + e.toString());
        }
    }
}