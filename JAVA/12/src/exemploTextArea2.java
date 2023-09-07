import java.awt.GridLayout;

import javax.swing.JCheckBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;

public class exemploTextArea2 {

	public static void main(String[] args) {
		JFrame janelaPrincipal =new JFrame("Interfaces");
		janelaPrincipal.setSize(400,159);
		janelaPrincipal.setLocationRelativeTo(null);
		
		JPanel panel =new JPanel(new GridLayout(4,1));		
	
		
		JCheckBox chk1 = new JCheckBox("Islam");	
		JCheckBox chk2 = new JCheckBox("cristianismo");
		JCheckBox chk3 = new JCheckBox("hinduismo", true);
		
		panel.add(new JLabel("escolha as religioes de preferencia", JLabel.CENTER));
		panel.add(chk1);
		panel.add(chk2);
		panel.add(chk3);
		
		janelaPrincipal.getContentPane().add(panel);
		janelaPrincipal.setVisible(true);

	}

}
