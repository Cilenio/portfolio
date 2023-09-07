import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.Scanner;

public class ManipulacaoDeFicheiros {
	 static Scanner k = new Scanner(System.in);
	 
	public static void adicionarFuncionarioNoFicheiro() throws IOException {		
		try {
			FileWriter escrever = new FileWriter("funcionarios.txt", true);
			BufferedWriter criar = new BufferedWriter(escrever);
			Trabalhador[] TrabalhadoreAntigos = RecuperarTrabalhadores();	
			FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
			ObjectOutputStream obj = new ObjectOutputStream(whrite);
		int i=0;
		while(TrabalhadoreAntigos[i] != null) {
			obj.writeObject(TrabalhadoreAntigos[i]);
			i++;
		}  		 
			System.out.println("Digitee o nome");String nome=k.next();
			System.out.println("Digite o codigo");int codigo=k.nextInt();
			System.out.println("Digite o quantidadeDeDias");double salario=k.nextInt();
			
			Trabalhador estudante =new Trabalhador(codigo, nome, salario);		
			escrever.write(estudante.toString());
			criar.newLine();
			
			obj.writeObject(estudante);
			
			whrite.close();	obj.close();			
			criar.close();	escrever.close();
		 	
		}catch(Exception e) {
		FileWriter escrever = new FileWriter("funcionarios.txt", true);
		BufferedWriter criar = new BufferedWriter(escrever);
			
		FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
		ObjectOutputStream obj = new ObjectOutputStream(whrite);
		
		Scanner k = new Scanner(System.in);
		System.out.println("Digitee o nome");String nome=k.next();
		System.out.println("Digite o codigo");int codigo=k.nextInt();
		System.out.println("Digite o quantidadeDeDias");double salario=k.nextInt();
		
		Trabalhador estudante =new Trabalhador(codigo, nome, salario);		
		escrever.write(estudante.toString());
		criar.newLine();
		
		obj.writeObject(estudante);
		
		whrite.close();	obj.close();		
		criar.close();	escrever.close();
		}
	}
	
	public static void imprimirTrabalhador() throws IOException, ClassNotFoundException {			
		FileReader escrever = new FileReader("funcionarios.txt");
		BufferedReader criar = new BufferedReader(escrever);
		
		String nome; int codigo; double salario;
		String[] dados;
		String linha=criar.readLine();
		
		while(linha != null && !linha.equals("")) {
			dados = linha.split("-");
			nome = dados[1];
			codigo=  Integer.parseInt(dados[0]);
			salario=Double.parseDouble(dados[2]);
			
			Trabalhador trabalhador = new Trabalhador(codigo,nome,salario);
			System.out.println("Texto= "+trabalhador.toString());
			
			linha = criar.readLine();
		}
		escrever.close(); criar.close();		
		
		try {
			Trabalhador[] TrabalhadoreAntigos = RecuperarTrabalhadores();	
			
			int i=0;		
			while(TrabalhadoreAntigos[i] != null) {
				System.out.println("Objecto= "+TrabalhadoreAntigos[i].toString());
				i++;
			}
		}
		catch(Exception e) {
			System.out.println("Nao ha contas para imprimir");
		}
		
		/// Trabalhador estudante =(Trabalhador)obj.readObject();
		// System.out.println("Objecto = "+estudante.toString());	
		//obj.close(); whrite.close();	
		}
		
	private static Trabalhador[] RecuperarTrabalhadores() throws IOException {
		Trabalhador[] trabalhadores = new Trabalhador[1000];
		FileInputStream file =new FileInputStream("funcionarios.bin");
		ObjectInputStream objs = new ObjectInputStream(file);
		
		try {
			for(int i=0; i<1000;i++) {
				trabalhadores[i] = (Trabalhador)objs.readObject();
				}
			}
		catch(Exception e){
			System.out.println();			
		}			
		return trabalhadores;
	}	
	
	public static void main(String[] args) throws IOException, ClassNotFoundException {
		Scanner k = new Scanner(System.in);
		
		int opc = 0;
		do {			
			System.out.println(	"\n" +"[1] Para Criar Trabalhador");
			System.out.println("[2] Para Vizualizar Trabalhadores");
			opc=k.nextInt();
			
			switch(opc) {
			case 1: adicionarFuncionarioNoFicheiro(); break;
			case 2: imprimirTrabalhador();break;
			default:break;
			}
		}while(opc != 0);		
	}
}

