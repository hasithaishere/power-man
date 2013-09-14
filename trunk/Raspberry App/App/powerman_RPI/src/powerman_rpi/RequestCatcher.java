/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.PrintWriter;
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
    public static void main(String[] args) throws Exception {
    ServerSocket m_ServerSocket = new ServerSocket(50005);
    int id = 0;
       
    test1 t1 = new test1();
    t1.start();
    
    while (true) {
        
      Socket clientSocket = m_ServerSocket.accept();
      ClientServiceThread cliThread = new ClientServiceThread(clientSocket, id++);
      cliThread.start();
      
    }
  }
}

//------------------START OF LISTEN SOCK THREAD CLASS--------------------
class ClientServiceThread extends Thread {
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
      e.printStackTrace();
    }
  }
}
//------------------END OF LISTEN SOCK THREAD CLASS--------------------

class test1 extends Thread
{
    public void run()
    {
        try {
            while(true)
            {
                System.out.println(new Date());
                sleep(3000);
            }
        } 
        catch (Exception e) {
            System.out.println(e);
        }
    }
}

class test2 extends Thread
{
    public void run()
    {
        System.out.println("--------------------");
        try {
            sleep(1000);
        } catch (InterruptedException ex) {
            Logger.getLogger(test2.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
