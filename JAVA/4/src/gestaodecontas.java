
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.Scanner;

import javax.swing.JTextPane;

public class gestaodecontas extends Conta {
	static Scanner k = new Scanner(System.in);
	public static String imprimir;
	protected static JTextPane h; 
	
	
	public static void depositar(Interface graf) throws IOException {
		int ss=0;	
		int numero = graf.NumeroDepositar;
		int valor = graf.ValorDepositar;		
		
		try {
			Conta[] contasAntigas = RecuperarContas();
			FileOutputStream file =new FileOutputStream("lista.bin");
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
	
		public static void levantarSaldo() {		
			System.out.println("Insira o numero da conta");
			int numero= k.nextInt();
			System.out.println("Insira o valor a levantar");
			int valor= k.nextInt();
			int ss=0;
			
			try {
				Conta[] contasAntigas = RecuperarContas();
				FileOutputStream file =new FileOutputStream("lista.bin");
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
				FileOutputStream file =new FileOutputStream("lista.bin");
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
		
	public static void Escrever(Interface inte) throws IOException {	
				
		try {
			Conta[] contasAntigas = RecuperarContas();			
			int i=0;	
			inte.textPane.setText("");
			while(contasAntigas[i] != null) {
				inte.textPane.setText(inte.textPane.getText()+ "\n"+contasAntigas[i].toString());
				i++;									
			}
		}
		catch(Exception e) {
			System.out.println("Nao ha contas para imprimir");
		}
	}
		
	
	public static void AdicionarContas(Interface graf )throws IOException {
			
			Conta[] contasAntigas = RecuperarContas();
			
			FileOutputStream file =new FileOutputStream("lista.bin");
			ObjectOutputStream objs = new ObjectOutputStream(file);				
			int i=0;			
			while(contasAntigas[i] != null) {				
				objs.writeObject(contasAntigas[i]);
				i++;				
			}	
			
			int numero = graf.numero;
			String nome = graf.nome;
			
			Conta novaconta = new Conta(nome, numero);
			objs.writeObject(novaconta);
			objs.close();
			file.close();
		}
				
	private static Conta[] RecuperarContas() {
		Conta[] contas = new Conta[1000];
			
		try {
			FileInputStream file =new FileInputStream("lista.bin");
			ObjectInputStream objs = new ObjectInputStream(file);
			for(int i=0; i<1000;i++) {
				contas[i] = (Conta)objs.readObject();
				}
			objs.close();
			file.close();
			}
		catch(Exception e){
			System.out.println();			
		}			
		return contas;
	}	
}
