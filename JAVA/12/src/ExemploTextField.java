import java.awt.GridLayout;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ExemploTextField {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel();		
		panel.setLayout(new GridLayout(3,2));
		
		JTextField text1 = new JTextField();
		JTextField text2 = new JTextField("Valor");
		
		String valortext1 =text1.getText();
		
		panel.add(new JLabel("Nome"));
		panel.add(text1);
		panel.add(new JLabel("apelido"));
		panel.add(text2);
		
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);
	}

}
