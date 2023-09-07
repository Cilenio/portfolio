import java.awt.Container;
import java.awt.GridLayout;

import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ExemploJPanel {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		JPanel panel =new JPanel();
		
		panel.setLayout(new GridLayout(3,2));
		
		panel.add(new JLabel("Nome"));
		panel.add(new JTextField());
		panel.add(new JLabel("apelido"));
		panel.add(new JTextField());
		panel.add(new JLabel("idade"));
		panel.add(new JTextField());
		
		Container container = janelaPrincipal.getContentPane();
		container.add(panel);
		janelaPrincipal.setVisible(true);

	}

}
