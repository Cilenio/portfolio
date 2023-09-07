import java.awt.BorderLayout;
import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.IOException;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.JLayeredPane;

import java.awt.Color;

import javax.swing.JTabbedPane;
import javax.swing.JLabel;

import java.awt.Font;
import java.awt.SystemColor;

import javax.swing.UIManager;
import javax.swing.JTextPane;
import javax.swing.JList;
import javax.swing.JScrollBar;
import javax.swing.JPasswordField;

@SuppressWarnings("serial")
public class Interface extends JFrame implements ActionListener {
	
	protected static JTextPane textPane; 
	private JPanel contentPane;
	private  JTextField textnome;
	public static int numero, NumeroDepositar,ValorDepositar;
	public static String nome ;
	private JTextField textNumero, textNumeroDepositar,textValorDepositar,textField_2,textField_3,
	textField_4, textField_5 , textField_6,textField_7;	
	
	JLayeredPane layeredPane;
	
	JPanel Panel_Depositar,	panel_Adicionar,  panel_Tranferir, panel_VizualizarSaldo,
	panel_VizualizarContas, panel_Levantar ;
	
	JButton btnAdicionarConta, btnDepositar, btnTranferir_1, btnTranferir, btnLevantar,
	btnVizualizar, btnConsultarSaldo, btnLevantarDinheiro, btnVizualizarContas,
	btnDepositar_1, btnCriar;

	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					Interface frame = new Interface();
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
	public Interface() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 618, 417);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));

		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JPanel panel = new JPanel();
		panel.setBackground(Color.GRAY);
		panel.setBounds(0, 0, 602, 382);
		contentPane.add(panel);
		panel.setLayout(null);
		
		//Paineis
		layeredPane = new JLayeredPane();
		layeredPane.setBackground(SystemColor.inactiveCaption);
		layeredPane.setBounds(190, 0, 416, 383);
		panel.add(layeredPane);
		
		Panel_Depositar = new JPanel();
		Panel_Depositar.setBackground(SystemColor.activeCaption);
		Panel_Depositar.setBounds(0, 0, 416, 383);		
		Panel_Depositar.setLayout(null);
		
		panel_Adicionar = new JPanel();
		panel_Adicionar.setBackground(SystemColor.inactiveCaption);
		panel_Adicionar.setBounds(0, 0, 416, 383);
		panel_Adicionar.setLayout(null);
		
		panel_Tranferir = new JPanel();
		panel_Tranferir.setBackground(SystemColor.activeCaption);
		panel_Tranferir.setBounds(0, 0, 416, 383);	
		panel_Tranferir.setLayout(null);
		
		panel_VizualizarSaldo = new JPanel();
		panel_VizualizarSaldo.setBackground(SystemColor.activeCaption);
		panel_VizualizarSaldo.setBounds(0, 0, 416, 383);	
		panel_VizualizarSaldo.setLayout(null);
		
		panel_Levantar = new JPanel();
		panel_Levantar.setBackground(SystemColor.activeCaption);
		panel_Levantar.setBounds(0, 0, 416, 383);
		panel_Levantar.setLayout(null);
		
		panel_VizualizarContas = new JPanel();
		panel_VizualizarContas.setForeground(SystemColor.textHighlight);
		panel_VizualizarContas.setBackground(SystemColor.activeCaption);
		panel_VizualizarContas.setBounds(0, 0, 416, 383);		
		panel_VizualizarContas.setLayout(null);
		
		
				
		//botoes//
		btnTranferir_1 = new JButton("Tranferir");
		btnTranferir_1.setBackground(Color.ORANGE);
		btnTranferir_1.setBounds(123, 296, 103, 23);
		panel_Tranferir.add(btnTranferir_1);
		
		btnConsultarSaldo = new JButton("Consultar Saldo");
		btnConsultarSaldo.setBounds(102, 189, 113, 23);
		btnConsultarSaldo.setBackground(Color.ORANGE);
		panel_VizualizarSaldo.add(btnConsultarSaldo);
		
		btnLevantar = new JButton("Levantar");
		btnLevantar.setBackground(Color.ORANGE);
		btnLevantar.setBounds(157, 231, 86, 23);
		panel_Levantar.add(btnLevantar);
		btnLevantar.addActionListener(this);
		
		btnAdicionarConta = new JButton("Adicionar Conta");
		btnAdicionarConta.setBackground(Color.ORANGE);
		btnAdicionarConta.setBounds(35, 105, 145, 23);
		panel.add(btnAdicionarConta);
		btnAdicionarConta.addActionListener(this);
		
		btnDepositar = new JButton("Depositar Valor");
		btnDepositar.setBackground(Color.ORANGE);
		btnDepositar.setBounds(35, 150, 145, 23);
		panel.add(btnDepositar);
		btnDepositar.addActionListener(this);
		
		btnTranferir = new JButton("Tranferir Valor");
		btnTranferir.setBackground(Color.ORANGE);
		btnTranferir.setBounds(35, 188, 145, 23);
		panel.add(btnTranferir);
		btnTranferir.addActionListener(this);
		
		btnVizualizar = new JButton("Vizualizar Saldo");
		btnVizualizar.setBackground(Color.ORANGE);
		btnVizualizar.setBounds(35, 227, 145, 23);
		panel.add(btnVizualizar);
		btnVizualizar.addActionListener(this);
		
		btnLevantarDinheiro = new JButton("Levantar Dinheiro");
		btnLevantarDinheiro.setBackground(Color.ORANGE);
		btnLevantarDinheiro.setBounds(35, 275, 145, 23);
		panel.add(btnLevantarDinheiro);
		btnLevantarDinheiro.addActionListener(this);
		
		btnVizualizarContas = new JButton("Vizualizar Contas");
		btnVizualizarContas.setBackground(Color.ORANGE);
		btnVizualizarContas.setBounds(35, 321, 145, 23);
		panel.add(btnVizualizarContas);
		btnVizualizarContas.addActionListener(this);
		
		btnDepositar_1 = new JButton("Depositar");
		btnDepositar_1.setBackground(Color.ORANGE);
		btnDepositar_1.setBounds(109, 282, 127, 23);
		Panel_Depositar.add(btnDepositar_1);
		btnDepositar_1.addActionListener(this);
		
		btnCriar = new JButton("Adicionar");
		btnCriar.setBackground(UIManager.getColor("Table.light"));
		btnCriar.setBounds(132, 271, 88, 23);
		panel_Adicionar.add(btnCriar);
		btnCriar.addActionListener(this);
		
		
			//Labels	
		JLabel lblTranferirDinheiro = new JLabel("Tranferir Dinheiro");
		lblTranferirDinheiro.setBounds(140, 43, 131, 20);
		lblTranferirDinheiro.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		panel_Tranferir.add(lblTranferirDinheiro);
		
		JLabel lblDaConta = new JLabel("Da conta");
		lblDaConta.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblDaConta.setBounds(27, 114, 127, 29);
		panel_Tranferir.add(lblDaConta);
		

		JLabel lblNome = new JLabel("Nome");
		lblNome.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNome.setBounds(31, 119, 127, 29);
		panel_Adicionar.add(lblNome);
		
		JLabel lblNumero = new JLabel("Numero");
		lblNumero.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNumero.setBounds(31, 190, 127, 29);
		panel_Adicionar.add(lblNumero);
		
		JLabel lblParaConta = new JLabel("Para Conta");
		lblParaConta.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblParaConta.setBounds(27, 166, 127, 29);
		panel_Tranferir.add(lblParaConta);
		
		JLabel lblMontante = new JLabel("Montante ");
		lblMontante.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblMontante.setBounds(27, 216, 127, 29);
		panel_Tranferir.add(lblMontante);
		
		JLabel lblDepositar = new JLabel("DEPOSITAR");
		lblDepositar.setBounds(109, 36, 127, 29);
		lblDepositar.setFont(new Font("Times New Roman", Font.BOLD, 20));
		Panel_Depositar.add(lblDepositar);
		
		JLabel lblNumeroDaConta = new JLabel("Numero Da conta");
		lblNumeroDaConta.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNumeroDaConta.setBounds(111, 111, 146, 29);
		Panel_Depositar.add(lblNumeroDaConta);
		
		JLabel lblValorDoDeposito = new JLabel("Valor Do Deposito");
		lblValorDoDeposito.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblValorDoDeposito.setBounds(109, 196, 127, 29);
		Panel_Depositar.add(lblValorDoDeposito);
		
		JLabel lblVizualizarSaldo = new JLabel("Vizualizar Saldo");
		lblVizualizarSaldo.setBounds(102, 39, 113, 20);
		lblVizualizarSaldo.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		panel_VizualizarSaldo.add(lblVizualizarSaldo);
		
		JLabel lblInsiraONumero = new JLabel("Insira o Numero Da Conta");
		lblInsiraONumero.setBounds(70, 108, 180, 29);
		lblInsiraONumero.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		panel_VizualizarSaldo.add(lblInsiraONumero);
		
		JLabel lblVizualizarContas = new JLabel("Vizualizar Contas");
		lblVizualizarContas.setForeground(SystemColor.desktop);
		lblVizualizarContas.setBackground(SystemColor.textHighlight);
		lblVizualizarContas.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblVizualizarContas.setBounds(88, 19, 127, 29);
		panel_VizualizarContas.add(lblVizualizarContas);
		
		JLabel lblNewLabel = new JLabel("Sistema Bancario");
		lblNewLabel.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNewLabel.setBounds(26, 11, 127, 29);
		panel.add(lblNewLabel);
		
		JLabel lblEscolhaOServico = new JLabel("Escolha o Servico");
		lblEscolhaOServico.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblEscolhaOServico.setBounds(26, 51, 127, 29);
		panel.add(lblEscolhaOServico);
		
		JLabel lblLevantarDinheiro = new JLabel("Levantar Dinheiro");
		lblLevantarDinheiro.setBounds(105, 53, 138, 20);
		lblLevantarDinheiro.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		panel_Levantar.add(lblLevantarDinheiro);
		
		JLabel lblNumeroDaConta_1 = new JLabel("Numero Da Conta");
		lblNumeroDaConta_1.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblNumeroDaConta_1.setBounds(20, 115, 127, 29);
		panel_Levantar.add(lblNumeroDaConta_1);
		
		JLabel lblValorALevantar = new JLabel("Valor a Levantar");
		lblValorALevantar.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblValorALevantar.setBounds(20, 162, 127, 29);
		panel_Levantar.add(lblValorALevantar);
		
		JLabel lblAdicionarConta = new JLabel("Adicionar Conta");
		lblAdicionarConta.setFont(new Font("Times New Roman", Font.PLAIN, 16));
		lblAdicionarConta.setBounds(82, 40, 127, 29);
		panel_Adicionar.add(lblAdicionarConta);
		
		
		//TextField
		
		textField_5 = new JTextField();
		textField_5.setBounds(102, 148, 113, 20);
		panel_VizualizarSaldo.add(textField_5);
		textField_5.setColumns(10);
		
		textField_6 = new JTextField();
		textField_6.setBounds(157, 120, 86, 20);
		panel_Levantar.add(textField_6);
		textField_6.setColumns(10);
		
		textField_7 = new JTextField();
		textField_7.setBounds(157, 167, 86, 20);
		panel_Levantar.add(textField_7);
		textField_7.setColumns(10);
		
		textField_2 = new JTextField();
		textField_2.setBounds(123, 119, 103, 20);
		panel_Tranferir.add(textField_2);
		textField_2.setColumns(10);
		
		textField_3 = new JTextField();
		textField_3.setBounds(123, 171, 103, 20);
		panel_Tranferir.add(textField_3);
		textField_3.setColumns(10);
		
		textField_4 = new JTextField();
		textField_4.setBounds(123, 221, 103, 20);
		panel_Tranferir.add(textField_4);
		textField_4.setColumns(10);
		
		textnome = new JTextField();
		textnome.setBounds(106, 124, 132, 20);
		panel_Adicionar.add(textnome);
		textnome.setColumns(10);
		
		textNumero = new JTextField();
		textNumero.setBounds(106, 195, 132, 20);
		panel_Adicionar.add(textNumero);
		textNumero.setColumns(10);
		
		textNumeroDepositar = new JTextField();
		textNumeroDepositar.setBounds(108, 140, 121, 20);
		Panel_Depositar.add(textNumeroDepositar);
		textNumeroDepositar.setColumns(10);
		
		textValorDepositar = new JTextField();
		textValorDepositar.setBounds(109, 225, 120, 20);
		Panel_Depositar.add(textValorDepositar);
		textValorDepositar.setColumns(10);
		
		//TextPane
		JTextPane txtpnJjj = new JTextPane();
		txtpnJjj.setBounds(70, 266, 169, 29);
		txtpnJjj.setBackground(SystemColor.inactiveCaption);
		panel_VizualizarSaldo.add(txtpnJjj);					
		
		textPane = new JTextPane();
		textPane.setBackground(SystemColor.inactiveCaption);
		textPane.setBounds(35, 59, 356, 286);
		panel_VizualizarContas.add(textPane);
		
	
		int t =55;	
		layeredPane.add(Panel_Depositar, Integer.valueOf(t));
	    layeredPane.add(panel_Adicionar, Integer.valueOf(t));
		layeredPane.add(panel_VizualizarSaldo, Integer.valueOf(t));
		layeredPane.add(panel_VizualizarContas, Integer.valueOf(t));
		layeredPane.add(panel_Tranferir, Integer.valueOf(t) );
	    layeredPane.add(panel_Levantar,JLayeredPane.DEFAULT_LAYER);
	}
		
	@Override
	public void actionPerformed(ActionEvent e) {
		if(e.getSource()== btnAdicionarConta) {
			layeredPane.removeAll();
			layeredPane.add(panel_Adicionar, JLayeredPane.DRAG_LAYER);			
		}
		if(e.getSource()== btnCriar) {
			
			try {
				if(textnome.getText().isEmpty() == false && textNumero.getText().isEmpty() ==false){
					nome = textnome.getText();
					numero = Integer.parseInt(textNumero.getText());
					gestaodecontas.AdicionarContas(null);
					textnome.setText("");
					textNumero.setText("");
				} 
			} catch (IOException e1) {
				e1.printStackTrace();
			}
		}
						
		if(e.getSource()== btnDepositar ) {
			layeredPane.removeAll();
			layeredPane.add(Panel_Depositar, JLayeredPane.DRAG_LAYER);
		}
		if(e.getSource()== btnDepositar_1 ) {
			NumeroDepositar= Integer.parseInt(textNumeroDepositar.getText());
			ValorDepositar =Integer.parseInt(textValorDepositar.getText());
			try {
				gestaodecontas.depositar(null);
			} catch (IOException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
		}
		
		if(e.getSource()== btnTranferir) {
			layeredPane.removeAll();
			layeredPane.add(panel_Tranferir,JLayeredPane.DRAG_LAYER);
		}
		if(e.getSource()== btnVizualizar) {
			layeredPane.removeAll();
			layeredPane.add(panel_VizualizarSaldo,JLayeredPane.DRAG_LAYER);
		}
		if(e.getSource()== btnLevantarDinheiro) {
			layeredPane.removeAll();
			layeredPane.add(panel_Levantar,JLayeredPane.DRAG_LAYER);
		}
		if(e.getSource()== btnVizualizarContas) {
			layeredPane.removeAll();					
				try {
					layeredPane.removeAll();						
					gestaodecontas.Escrever(null);
					gestaodecontas go = new gestaodecontas();								
					layeredPane.add(panel_VizualizarContas,JLayeredPane.DRAG_LAYER);
				} catch (IOException e1) {				
					e1.printStackTrace();
				}	
		}
	}
}
