import java.awt.Container;
import java.awt.GridLayout;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ExemploJLabel {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel();		
		panel.setLayout(new GridLayout(3,2));
		
		JLabel lab1 = new JLabel("Nome");
		JLabel lab2 = new JLabel("label centralizado", JLabel.CENTER);
		panel.add(lab1);
		panel.add(lab2);
		
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
