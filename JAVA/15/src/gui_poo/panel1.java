package gui_poo;

import java.awt.BorderLayout;
import java.awt.FlowLayout;

import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JLabel;
import java.awt.Color;
import java.awt.SystemColor;
import java.awt.Font;

public class panel1 extends JPanel{

	private final JPanel contentPanel = new JPanel();

	public panel1() {
		setBackground(SystemColor.inactiveCaption);
		setLayout(null);
		
		JLabel lblNewLabel = new JLabel("SEGUNDA TELA");
		lblNewLabel.setBounds(175, 39, 118, 44);
		add(lblNewLabel);
		
		JButton btnNewButton = new JButton("voltar");
		btnNewButton.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton.setBounds(172, 94, 89, 23);
		add(btnNewButton);
		
		JPanel panel_1 = new JPanel();
		panel_1.setLayout(null);
	
		JPanel panel = new JPanel();
		panel.setBounds(84, 0, 172, 244);
		
		
	}
}