import java.awt.GridLayout;

import javax.swing.JCheckBox;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;

public class ExemploJcomboBox {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,70);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel(new GridLayout(1,2));		
	
		JComboBox comb = new JComboBox();
		
		comb.addItem("computador");
		comb.addItem("tv");
		comb.addItem("DVD");
		
		panel.add(new JLabel("escolha um produto"));
		panel.add(comb);
				
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
