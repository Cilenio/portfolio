package jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTree;
import javax.swing.JButton;
import java.awt.Color;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import javax.swing.JMenu;
import javax.swing.JDesktopPane;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JMenuBar;
import javax.swing.JList;
import javax.swing.JSeparator;
import java.awt.SystemColor;
import javax.swing.JLabel;
import java.awt.Component;
import javax.swing.JEditorPane;
import javax.swing.JMenuItem;
import javax.swing.JOptionPane;
import javax.swing.JCheckBoxMenuItem;
import javax.swing.JPopupMenu;
import java.awt.Font;
import java.awt.Window.Type;
import javax.swing.JTextPane;

public class k extends JFrame {

	private JPanel contentPane;
	private JPanel panel;
	private JPanel panel_1;
	private JLabel lblNewLabel;
	private JButton btnNewButton;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					k frame = new k();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public k() {
		setResizable(false);
		setForeground(Color.WHITE);
		setBackground(Color.WHITE);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 710, 457);
		contentPane = new JPanel();
		contentPane.setToolTipText("");
		contentPane.setBackground(Color.DARK_GRAY);
		contentPane.setForeground(SystemColor.textHighlight);

		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		panel = new JPanel();
		panel.setBackground(SystemColor.activeCaption);
		panel.setBounds(0, 0, 230, 422);
		contentPane.add(panel);
		panel.setLayout(null);
		
		lblNewLabel = new JLabel("WELCOME");
		lblNewLabel.setFont(new Font("Times New Roman", Font.PLAIN, 24));
		lblNewLabel.setBounds(23, 14, 148, 63);
		lblNewLabel.setAlignmentY(Component.BOTTOM_ALIGNMENT);
		lblNewLabel.setAlignmentX(Component.RIGHT_ALIGNMENT);
		lblNewLabel.setToolTipText("");
		panel.add(lblNewLabel);
		
		panel_1 = new JPanel();
		panel_1.setBounds(198, 14, 1, 1);
		panel.add(panel_1);
		panel_1.setLayout(null);
		
		btnNewButton = new JButton("OPC");
		btnNewButton.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton.setBackground(SystemColor.activeCaption);
		btnNewButton.setForeground(SystemColor.desktop);
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				JOptionPane.showInputDialog(getFocusTraversalPolicy());
		     
				System.out.println("vvv");
			}
		});
		btnNewButton.setBounds(37, 104, 102, 23);
		panel.add(btnNewButton);
		
		JButton btnNewButton_1 = new JButton("OPC");
		btnNewButton_1.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton_1.setForeground(Color.BLACK);
		btnNewButton_1.setBackground(SystemColor.activeCaption);
		btnNewButton_1.setBounds(37, 157, 102, 23);
		panel.add(btnNewButton_1);
		
		JButton btnNewButton_2 = new JButton("OPC");
		btnNewButton_2.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton_2.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
			}
		});
		btnNewButton_2.setForeground(Color.BLACK);
		btnNewButton_2.setBackground(SystemColor.activeCaption);
		btnNewButton_2.setBounds(37, 205, 102, 23);
		panel.add(btnNewButton_2);
		
		JButton btnNewButton_3 = new JButton("OPC");
		btnNewButton_3.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton_3.setForeground(Color.BLACK);
		btnNewButton_3.setBackground(SystemColor.activeCaption);
		btnNewButton_3.setBounds(37, 267, 102, 23);
		panel.add(btnNewButton_3);
		
		JPanel panel_2 = new JPanel();
		panel_2.setBackground(Color.GRAY);
		panel_2.setBounds(228, 0, 466, 422);
		contentPane.add(panel_2);
		panel_2.setLayout(null);
		
		JTextPane textPane = new JTextPane();
		textPane.setBounds(37, 102, 211, 30);
		panel_2.add(textPane);
	}
	private static void addPopup(Component component, final JPopupMenu popup) {
		component.addMouseListener(new MouseAdapter() {
			public void mousePressed(MouseEvent e) {
				if (e.isPopupTrigger()) {
					showMenu(e);
				}
			}
			public void mouseReleased(MouseEvent e) {
				if (e.isPopupTrigger()) {
					showMenu(e);
				}
			}
			private void showMenu(MouseEvent e) {
				popup.show(e.getComponent(), e.getX(), e.getY());
			}
		});
	}
}
