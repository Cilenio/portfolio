package gui_poo;

import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.Window.Type;
import javax.swing.JLabel;
import java.awt.SystemColor;
import javax.swing.UIManager;
import javax.swing.JComboBox;
import java.awt.Font;
import javax.swing.JButton;
import java.awt.event.ActionListener;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.Scanner;
import java.awt.event.ActionEvent;
import java.awt.BorderLayout;
import java.awt.Color;
import javax.swing.JCheckBox;
import java.awt.Component;
import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.LayoutStyle.ComponentPlacement;
import java.awt.GridBagLayout;
import java.awt.GridBagConstraints;
import java.awt.Insets;
import java.awt.FlowLayout;
import javax.swing.SwingConstants;
import java.awt.Rectangle;

public class main extends JFrame {

	private JPanel contentPane;
	private JPanel panel;
	public int igual;
	private JButton btnNewButton_1;
	private JButton btnNewButton_2;
	private JButton btnNewButton_3;
	private JLabel lblNewLabel;
	private JLabel lblNewLabel_1;
	private JLabel lblNewLabel_2;
	
	static Scanner k = new Scanner(System.in);
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					main frame = new main();
					frame.setVisible(true);
									
					
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}
	
	public main() {
		setAlwaysOnTop(true);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 688, 385);
		contentPane = new JPanel();
		contentPane.setAutoscrolls(true);
		contentPane.setBackground(SystemColor.activeCaption);
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		
		
		setContentPane(contentPane);
		
		 panel = new JPanel();
		 panel.setBounds(new Rectangle(21, 0, 0, 0));
		panel.setBackground(new Color(112, 128, 144));
		
		JButton btnNewButton = new JButton("Adicionar conta");
		btnNewButton.setBackground(new Color(199, 21, 133));
		btnNewButton.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		btnNewButton.setAutoscrolls(true);
		btnNewButton.setAlignmentY(Component.TOP_ALIGNMENT);
		btnNewButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				try {
					painel();
				} catch (IOException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
			}
		});
		
		btnNewButton_1 = new JButton("Imprimir contas");
		btnNewButton_1.setBackground(new Color(199, 21, 133));
		btnNewButton_1.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		
		btnNewButton_2 = new JButton("Alterar saldo");
		btnNewButton_2.setBackground(new Color(199, 21, 133));
		btnNewButton_2.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		
		btnNewButton_3 = new JButton("Transferir");
		btnNewButton_3.setBackground(new Color(199, 21, 133));
		btnNewButton_3.setFont(new Font("Times New Roman", Font.PLAIN, 12));
		
		lblNewLabel = new JLabel("Gestao de Contas Do Banco Cilenio Magul");
		lblNewLabel.setFont(new Font("Times New Roman", Font.BOLD, 17));
		GroupLayout gl_contentPane = new GroupLayout(contentPane);
		gl_contentPane.setHorizontalGroup(
			gl_contentPane.createParallelGroup(Alignment.TRAILING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGroup(gl_contentPane.createParallelGroup(Alignment.TRAILING)
								.addComponent(btnNewButton_3, GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
								.addComponent(btnNewButton_2, GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
								.addComponent(btnNewButton_1, GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE)
								.addComponent(btnNewButton, GroupLayout.DEFAULT_SIZE, 135, Short.MAX_VALUE))
							.addPreferredGap(ComponentPlacement.RELATED)
							.addComponent(panel, GroupLayout.DEFAULT_SIZE, 491, Short.MAX_VALUE)
							.addGap(20))
						.addGroup(gl_contentPane.createSequentialGroup()
							.addComponent(lblNewLabel, GroupLayout.DEFAULT_SIZE, 381, Short.MAX_VALUE)
							.addGap(178))))
		);
		gl_contentPane.setVerticalGroup(
			gl_contentPane.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_contentPane.createSequentialGroup()
					.addContainerGap()
					.addComponent(lblNewLabel, GroupLayout.DEFAULT_SIZE, 24, Short.MAX_VALUE)
					.addGap(18)
					.addGroup(gl_contentPane.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_contentPane.createSequentialGroup()
							.addGap(21)
							.addComponent(btnNewButton, GroupLayout.DEFAULT_SIZE, 23, Short.MAX_VALUE)
							.addGap(46)
							.addComponent(btnNewButton_1, GroupLayout.DEFAULT_SIZE, 23, Short.MAX_VALUE)
							.addGap(57)
							.addComponent(btnNewButton_2, GroupLayout.DEFAULT_SIZE, 23, Short.MAX_VALUE)
							.addGap(49)
							.addComponent(btnNewButton_3, GroupLayout.DEFAULT_SIZE, GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
						.addComponent(panel, Alignment.TRAILING, GroupLayout.DEFAULT_SIZE, 265, Short.MAX_VALUE))
					.addGap(22))
		);
		
		lblNewLabel_1 = new JLabel("Bem vindo ao Sistema Bancario\r\n");
		lblNewLabel_1.setFont(new Font("Times New Roman", Font.BOLD, 25));
		
		lblNewLabel_2 = new JLabel("Selecione a Opcao que Deseja");
		lblNewLabel_2.setFont(new Font("Times New Roman", Font.BOLD, 25));
		GroupLayout gl_panel = new GroupLayout(panel);
		gl_panel.setHorizontalGroup(
			gl_panel.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panel.createSequentialGroup()
					.addGap(39)
					.addComponent(lblNewLabel_1, GroupLayout.DEFAULT_SIZE, 375, Short.MAX_VALUE)
					.addGap(77))
				.addGroup(gl_panel.createSequentialGroup()
					.addGap(49)
					.addComponent(lblNewLabel_2, GroupLayout.DEFAULT_SIZE, 343, Short.MAX_VALUE)
					.addGap(99))
		);
		gl_panel.setVerticalGroup(
			gl_panel.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panel.createSequentialGroup()
					.addGap(11)
					.addComponent(lblNewLabel_1, GroupLayout.DEFAULT_SIZE, 123, Short.MAX_VALUE)
					.addGap(131))
				.addGroup(gl_panel.createSequentialGroup()
					.addGap(131)
					.addComponent(lblNewLabel_2, GroupLayout.DEFAULT_SIZE, 61, Short.MAX_VALUE)
					.addGap(73))
		);
		panel.setLayout(gl_panel);
		contentPane.setLayout(gl_contentPane);
	
		
	}
	public void painel() throws IOException {
		ppp pp = new ppp();
		pp.setSize(490, 306);
		pp.setLocation(0,0);
		panel.removeAll();
		panel.add(pp);
		panel.revalidate();
		panel.repaint();
		
		}
	public void teste() {
		
	}
///////////////////////////////////////////////////////////////////////////////////////////

	
   public static void depositar() throws IOException {
		
		System.out.println("Insira o numero da conta");
		int numero= k.nextInt();
		System.out.println("Insira o valor a depositar");
		int valor= k.nextInt();
		int ss=0;
		
		try {
			Conta[] contasAntigas = RecuperarContas();
			FileOutputStream file =new FileOutputStream("lista.txt");
			ObjectOutputStream objs = new ObjectOutputStream(file);
			int i=0;
			
			while(contasAntigas[i] != null) {
				if(contasAntigas[i].getNumero()!=numero) {
				objs.writeObject(contasAntigas[i]);
					}
				else {
					ss += contasAntigas[i].getSaldo()+valor;					
					contasAntigas[i].setSaldo(ss);	
					objs.writeObject(contasAntigas[i]);
					System.out.println("Efetuou o deposito de: "+valor+" MZN");					
					}					
				i++;
				}			
			objs.close();
			file.close();			
		}
		catch(Exception e) {
			System.out.println("Nao ha contas para depositar dinheiro");
			}
	}	
	
///////////////////////////////////////////////////////////////////////////////////////////

		public static void levantarSaldo() {		
			System.out.println("Insira o numero da conta");
			int numero= k.nextInt();
			System.out.println("Insira o valor a levantar");
			int valor= k.nextInt();
			int ss=0;
			
			try {
				Conta[] contasAntigas = RecuperarContas();
				FileOutputStream file =new FileOutputStream("lista.txt");
				ObjectOutputStream objs = new ObjectOutputStream(file);
				int i=0;
				
				while(contasAntigas[i] != null) {
					if(contasAntigas[i].getNumero()!=numero) {
						objs.writeObject(contasAntigas[i]);
						}				
					else {
						if(valor<contasAntigas[i].getSaldo()) {
							ss += contasAntigas[i].getSaldo()-valor;						
							contasAntigas[i].setSaldo(ss);	
							objs.writeObject(contasAntigas[i]);
						}
						else {
							objs.writeObject(contasAntigas[i]);
							System.out.println("Nao tem saldo suficiente para levantar!");
							System.out.println("O saldo na conta: "+numero+", E de: "+contasAntigas[i].getSaldo()+" MZN");
							}						
						}
					i++;
				}			
				objs.close();
				file.close();			
			}
			catch(Exception e) {
				System.out.println("Nao ha contas para levantar dinheiro");
				}		
		}
///////////////////////////////////////////////////////////////////////////////////////////
		
		public static void vizualizarSaldo() {
			System.out.println("Insira o numero da conta");
			int numero= k.nextInt();
			
			try {
				Conta[] contasAntigas = RecuperarContas();
				
				int i=0;
				while(contasAntigas[i] != null) {
					if(numero==contasAntigas[i].getNumero()) {
						System.out.println("O saldo na conta: "+numero+" e de: "+contasAntigas[i].getSaldo()+"MZN");
						}
					i++;
				}
			}
			catch(Exception e) {
				System.out.println("Nao ha contas para vizualizar saldo");
			}
		}
		
///////////////////////////////////////////////////////////////////////////////////////////

				
		public static void transferir() {		
			System.out.println("Insira o numero da conta da qual pretente tranferir");
			int numeroMandatario= k.nextInt();
			System.out.println("Insira o numero da conta para qual pretente tranferir");
			int numeroDestinatario= k.nextInt();
			System.out.println("Insira o Montante a tranferir");
			int valor= k.nextInt();
			
			int ss=0;
			int recebe=0;
			boolean tranferiu = false;
			
			try {
				Conta[] contasAntigas = RecuperarContas();
				FileOutputStream file =new FileOutputStream("lista.txt");
				ObjectOutputStream objs = new ObjectOutputStream(file);
				int i=0;
				
				while(contasAntigas[i] != null) {
					if(contasAntigas[i].getNumero()!=numeroMandatario && contasAntigas[i].getNumero()!=numeroDestinatario) {
						objs.writeObject(contasAntigas[i]);
						}				
					if(numeroMandatario==contasAntigas[i].getNumero()) {						
						if(valor<=contasAntigas[i].getSaldo()) {
							ss += contasAntigas[i].getSaldo()-valor;						
							contasAntigas[i].setSaldo(ss);	
							objs.writeObject(contasAntigas[i]);
							tranferiu = true;
						}
						else {
							objs.writeObject(contasAntigas[i]);
							System.out.println("Nao tem saldo suficiente para tranferir!");
							System.out.println("O saldo na conta: "+numeroMandatario+", E de: "+contasAntigas[i].getSaldo()+" MZN");
							}					
						}
					i++;
				}	
				
				i =0;
				while(contasAntigas[i] != null) {
					if(numeroDestinatario==contasAntigas[i].getNumero()) {
						if(tranferiu==true) {
							recebe += contasAntigas[i].getSaldo()+valor;						
							contasAntigas[i].setSaldo(recebe);	
							objs.writeObject(contasAntigas[i]);
							System.out.println("Tranferencia bem sucedida");
							}
					else {
						objs.writeObject(contasAntigas[i]);
						System.out.println("Tranferencia mal sucedida");
						}					
					}
					i++;
				}			
				objs.close();
				file.close();			
			}
			catch(Exception e) {
				System.out.println("Nao ha contas para levantar dinheiro");
			}
		}
		
///////////////////////////////////////////////////////////////////////////////////////////
		
	public static void Escrever() throws IOException {		
		try {
			Conta[] contasAntigas = RecuperarContas();				
			int i=0;		
			while(contasAntigas[i] != null) {
				System.out.println(contasAntigas[i]);
				i++;
			}
		}
		catch(Exception e) {
			System.out.println("Nao ha contas para imprimir");
		}
	}
		
///////////////////////////////////////////////////////////////////////////////////////////

	
	public static void AdicionarContas()throws IOException {
		
		try {
			Conta[] contasAntigas = RecuperarContas();		
			FileOutputStream file =new FileOutputStream("lista.txt");
			ObjectOutputStream objs = new ObjectOutputStream(file);				
			int i=0;
			
			while(contasAntigas[i] != null) {
				objs.writeObject(contasAntigas[i]);
				i++;		
			}
			
			System.out.println("Digite o Nome: ");
			String nome = k.next();
			System.out.println("Digite o numero: ");
			int numero = k.nextInt();
			
			Conta novaconta = new Conta(nome, numero);
			objs.writeObject(novaconta);
			objs.close();
			file.close();
		}
		
		catch(Exception e) {
			FileOutputStream file =new FileOutputStream("lista.txt");
			ObjectOutputStream objs = new ObjectOutputStream(file);
		
			System.out.println("Digite o Nome: ");
			String nome = k.next();
			System.out.println("Digite o numero: ");
			int numero = k.nextInt();
			
			Conta novaconta = new Conta(nome, numero);
			objs.writeObject(novaconta);
			objs.close();
			file.close();
		}	
	}

///////////////////////////////////////////////////////////////////////////////////////////

	
	private static Conta[] RecuperarContas() throws IOException {
		Conta[] contas = new Conta[1000];
		FileInputStream file =new FileInputStream("lista.txt");
		ObjectInputStream objs = new ObjectInputStream(file);
		
		try {
			for(int i=0; i<1000;i++) {
				contas[i] = (Conta)objs.readObject();
				}
			}
		catch(Exception e){
			System.out.println();			
		}			
		return contas;
	}	
}

