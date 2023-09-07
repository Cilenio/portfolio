import java.awt.GridLayout;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.JTextField;

public class ExemploTextArea {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel();		
		panel.setLayout(new GridLayout(3,2));
		
		JTextArea text1 = new JTextArea("valor defautlt");		
		
		panel.add(new JLabel("descricao"));
		panel.add(text1);
		
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
