/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package powerman_rpi;

import java.io.BufferedReader;
import java.io.DataInputStream;
import java.io.FileInputStream;
import java.io.InputStreamReader;

/**
 *
 * @author hasitha
 */
public class Con_config {

    public static String read_config(int index)
    {
        
        String[] Dataarr = new String[10];
        try
        {
            String filepath = "/var/powerman/config/config.dat";            
            
            FileInputStream fstream = new FileInputStream(filepath);

            DataInputStream in = new DataInputStream(fstream);
            BufferedReader br = new BufferedReader(new InputStreamReader(in));
            String strLine;

            int i = 0;
            while ((strLine = br.readLine()) != null)   {
            Dataarr[i] = strLine;
            i++;
            }

            in.close();
              }catch (Exception e){
            System.err.println("Error: " + e.getMessage());
            }

          return Dataarr[index];

    }
    
}
