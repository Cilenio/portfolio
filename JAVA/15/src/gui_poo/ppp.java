package gui_poo;

import javax.swing.JPanel;
import java.awt.Color;
import java.awt.SystemColor;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JTextField;
import javax.swing.JFormattedTextField;
import javax.swing.JTextPane;
import javax.swing.JList;
import javax.swing.JEditorPane;
import java.awt.Choice;
import java.awt.Scrollbar;
import java.awt.TextArea;
import java.io.IOException;

public class ppp extends JPanel {

	/**
	 * Create the panel.
	 * @throws IOException 
	 */
	public ppp() throws IOException {
		setBackground(SystemColor.activeCaption);
		
		JPanel panel = new JPanel();
		panel.setBackground(new Color(135, 206, 250));
		GroupLayout groupLayout = new GroupLayout(this);
		groupLayout.setHorizontalGroup(
			groupLayout.createParallelGroup(Alignment.LEADING)
				.addComponent(panel, Alignment.TRAILING, GroupLayout.DEFAULT_SIZE, 592, Short.MAX_VALUE)
		);
		groupLayout.setVerticalGroup(
			groupLayout.createParallelGroup(Alignment.TRAILING)
				.addComponent(panel, Alignment.LEADING, GroupLayout.DEFAULT_SIZE, 356, Short.MAX_VALUE)
		);
		panel.setLayout(null);	
		TextArea textArea = new TextArea();
		textArea.setText("Hello world");
		textArea.setBounds(74, 44, 380, 277);
		panel.add(textArea);
		setLayout(groupLayout);
		main.depositar();

	}
}
