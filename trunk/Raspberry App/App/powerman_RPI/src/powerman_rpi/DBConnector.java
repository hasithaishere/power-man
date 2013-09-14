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

    public static Connection getconn(){
       try{
           //EncryptDecrypt ed = new EncryptDecrypt();
           //Crossconnector cc = new Crossconnector();

       Class.forName("com.mysql.jdbc.Driver");
       //con=DriverManager.getConnection("jdbc:mysql://"+ed.Decrypt(cc.read(0))+":"+ed.Decrypt(cc.read(1))+"/"+ed.Decrypt(cc.read(2)),ed.Decrypt(cc.read(3)),ed.Decrypt(cc.read(4)));
       con=DriverManager.getConnection("jdbc:mysql://127.0.0.1:3306/pm_lite","root","123");

       }catch(Exception e){
           System.out.println("getcon\n"+e);
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
        System.out.println("change\n"+e);
    }
    
     
}

public static  ResultSet  search(String s) throws SQLException{
        if (con==null) {
            getconn();

        }
     
        return con.createStatement().executeQuery(s);

}}

