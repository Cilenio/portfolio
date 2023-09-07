import java.sql.*;

import javax.swing.JOptionPane;

public class Conexao {
	Connection conexao = null;
	String driver = "org.gjt.mm.mysql.Driver";
	String connectionUrl = "jdbc:mysql://localhost/cilenio";
	
	public Connection conectar () {
			try {
				if(conexao == null ) {
				Class.forName(driver);
				conexao = DriverManager.getConnection(connectionUrl, "root", "");
                                    System.out.println(""
                                            + "sucesso");
				}
			} catch (Exception e) {
			JOptionPane.showMessageDialog(null, e.toString());
			}
			return conexao;
		
	}

}
