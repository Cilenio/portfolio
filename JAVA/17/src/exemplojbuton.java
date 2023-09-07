import java.awt.GridLayout;
import java.awt.event.ActionEvent;

import javax.swing.JButton;
import javax.swing.JFrame;
import javax.swing.JOptionPane;
import javax.swing.JPanel;

public class exemplojbuton {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,70);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel(new GridLayout(1,2));		
	
		JButton bt1 = new JButton("Gravar");
		JButton bt2 = new JButton("cancelar");
		
		panel.add(bt1);
		panel.add(bt2);
		bt1.addActionListener(new GravarAction(){
			public void actionPerformed(ActionEvent  e) {
				JOptionPane.showMessageDialog(null, "Cilenio");
			}
		});
		
		bt2.addActionListener(new GravarAction());
				
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
