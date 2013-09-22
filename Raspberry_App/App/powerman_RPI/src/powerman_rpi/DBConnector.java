package powerman_rpi;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Hasitha
 */
public class DBConnector {
    private static Connection con;
    private static Error_logging elog = new Error_logging();

    public static Connection getconn(){
       try{
           //EncryptDecrypt ed = new EncryptDecrypt();
           //Crossconnector cc = new Crossconnector();
           
       Con_config conf = new Con_config();    
           
       Class.forName("com.mysql.jdbc.Driver");
       //con=DriverManager.getConnection("jdbc:mysql://"+ed.Decrypt(cc.read(0))+":"+ed.Decrypt(cc.read(1))+"/"+ed.Decrypt(cc.read(2)),ed.Decrypt(cc.read(3)),ed.Decrypt(cc.read(4)));
       con=DriverManager.getConnection("jdbc:mysql://"+ conf.read_config(0) +":"+ conf.read_config(1) +"/"+ conf.read_config(2),conf.read_config(3),conf.read_config(4));

       }catch(Exception e){
           elog.save_log("Database class - getcon : " +  e.toString());
       }
       return con;
    }
    
public static void change(String s){
    if (con==null) {
        getconn();  
    }
    try {
        con.createStatement().executeUpdate(s);
    } catch (Exception e) {
        elog.save_log("Database class - change : " +  e.toString());
    }
    
     
}

public static  ResultSet  search(String s) throws SQLException{
        if (con==null) {
            getconn();

        }
     
        return con.createStatement().executeQuery(s);

}}

