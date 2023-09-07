import java.awt.GridLayout;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class ExemploJbutton {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,70);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel(new GridLayout(1,2));		
	
		JButton bt1 = new JButton("Gravar");
		JButton bt2 = new JButton("cancelar");
		
		panel.add(bt1);
		panel.add(bt2);
				
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
