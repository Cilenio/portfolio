import javax.swing.JOptionPane;
import java.awt.*;
import java.awt.event.*;
public class GravarAction implements ActionListener {
			String text;
			public GravarAction() {
				text="aha";			
			}
			
			public void actionPerformed(ActionEvent  e) {
				JOptionPane.showMessageDialog(null, text);
			}
		
		}
