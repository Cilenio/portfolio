package gui_poo;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.Scanner;

public class gestaodecontas extends Conta {
	static Scanner k = new Scanner(System.in);
	
	/*
	 * metodoMain onde fiz as chamadas dos metodos usando um menu
	 * com a estrutura de repeticao do while
	 */
	public static void main(String[] args) throws IOException, ClassNotFoundException {	
		Scanner k = new Scanner(System.in);
	
		int opc=0;
		do {
			System.out.println("[1] para Adicionar Uma Conta");
			System.out.println("[2] para imprimir as contas");
			System.out.println("[3] para depositar dinheiro na conta");
			System.out.println("[4] para levantar dinheiro na conta");
			System.out.println("[5] para vizualizar saldo em uma conta");
			System.out.println("[6] para tranferir dinheiro de uma conta para outra");
			opc=k.nextInt();
			
			switch(opc) {
			
			case 1: AdicionarContas();break;
			case 2: Escrever();break;
			case 3: depositar(); break;
			case 4: levantarSaldo();break;
			case 5: vizualizarSaldo();
			case 6: transferir();break;
			
			}			
		}while(opc != 9);
	}
	
	/*
	 * metodo para depositar valor, recebe o valor, e o numero de conta que vai ser efetuado o deposito
	 * o metodo reescreve no ficheiro dos metodo todos o metodos excepto o metodo que o numero da conta e
	 * igual ao numero da conta que se pretende depositar, se efectua o deposito e se escreve essa conta no fichiro de metodos 
	 */
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






