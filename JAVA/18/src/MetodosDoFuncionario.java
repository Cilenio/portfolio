import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.ArrayList;
import java.util.Scanner;

public class MetodosDoFuncionario {
	static Scanner k= new Scanner(System.in);
	
	public static void adicionarFuncionarioNoFicheiro() throws IOException {
		try {
		Funcionario[] TrabalhadoreAntigos = RecuperarTrabalhadores();
		FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
		ObjectOutputStream obj = new ObjectOutputStream(whrite);
		
		int i=0;
		while(TrabalhadoreAntigos[i] != null) {
			obj.writeObject(TrabalhadoreAntigos[i]);
			i++;
		}  	
		
		System.out.println("Digitee o nome");String nome=k.next();
		System.out.println("Digite o codigo");int codigo=k.nextInt();
		System.out.println("Digite o quantidadeDeDias");int quantidadeDeDias=k.nextInt();
		System.out.println("Digite o valorFixoDiario");int valorFixoDiario=k.nextInt();
		
		Funcionario estudante =new Funcionario(nome, codigo, quantidadeDeDias, valorFixoDiario);
		obj.writeObject(estudante);
		
		whrite.close();
		obj.close();
		}catch(Exception e) {
			FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
			ObjectOutputStream obj = new ObjectOutputStream(whrite);
			
			System.out.println("Digitee o nome");String nome=k.next();
			System.out.println("Digite o codigo");int codigo=k.nextInt();
			System.out.println("Digite o quantidadeDeDias");int quantidadeDeDias=k.nextInt();
			System.out.println("Digite o valorFixoDiario");int valorFixoDiario=k.nextInt();
			
			Funcionario estudante =new Funcionario(nome, codigo, quantidadeDeDias, valorFixoDiario);
			obj.writeObject(estudante);
		}
	}
	
	public static ArrayList<Funcionario> listaDoFuncionario() throws IOException{	
		ArrayList<Funcionario> estudantes = new ArrayList<Funcionario>();
		FileInputStream file =new FileInputStream("funcionarios.bin");
		ObjectInputStream objs = new ObjectInputStream(file);
		
		Funcionario[] TrabalhadoreAntigos = RecuperarTrabalhadores();		
		int i=0;		
		while(TrabalhadoreAntigos[i] != null) {
			estudantes.add(TrabalhadoreAntigos[i]);
			i++;
			}
		return estudantes;	
		}
	
	public static void listarEstudante() throws IOException{	
		ArrayList<Funcionario> estudantes = listaDoFuncionario();
		for (int i=0; i<estudantes.size(); i++){
			System.out.println(estudantes.get(i).toString());
		}
	}
	
	public static ArrayList<Funcionario> actualizarFuncionario(ArrayList<Funcionario> estudantes) throws IOException{
		 estudantes = listaDoFuncionario();
		 
		System.out.println("Digite o codigo "); int codigo=k.nextInt();
		for (int i=0; i<estudantes.size(); i++){
			Funcionario estudante=estudantes.get(i);
			int opc;			
			if(codigo==estudante.getCodigo()){
				System.out.println("O que deseja actualizar?");
				System.out.println("[1] O Nome do funcionario");
				System.out.println("[2] a Quantidade de dias que Trabalhou");
				System.out.println("[3] O valor fixo a receber");
				opc=k.nextInt();
				switch(opc) {
				case 1: System.out.println("Digitee o nome");String nome=k.next();
				estudante.setNome(nome); System.out.println("Nome actualizado com sucesso");break;
				
				case 2:System.out.println("Digite o quantidadeDeDias");double quantidadeDeDias=k.nextInt();
				estudante.setQuntidadeDeDias(quantidadeDeDias); break;
				
				case 3: System.out.println("Digite o valorFixoDiario");double valorFixoDiario=k.nextInt();			
				estudante.setValorFixoDiario(valorFixoDiario);
					}					
				estudante.setCodigo(codigo);				
				
				}
			}	
		FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
		ObjectOutputStream obj = new ObjectOutputStream(whrite);
		for (int i=0; i<estudantes.size(); i++){
			obj.writeObject(estudantes.get(i));
			}
		whrite.close();
		obj.close();
		return estudantes;		
	}
	
	public static void removerestudante(ArrayList<Funcionario> estudantes) throws IOException{
		 estudantes = listaDoFuncionario();
		System.out.println("Digite o codigo "); int codigo=k.nextInt();
		for (int i=0; i<estudantes.size(); i++){
			Funcionario estudante=estudantes.get(i);
			if(codigo==estudante.getCodigo()){
				estudantes.remove(estudante);
			}
		}
		FileOutputStream whrite = new FileOutputStream("funcionarios.bin");
		ObjectOutputStream obj = new ObjectOutputStream(whrite);
	
		for (int i=0; i<estudantes.size(); i++){
			Funcionario estudante=estudantes.get(i);
			obj.writeObject(estudantes.get(i));
			}
		whrite.close();
		obj.close();
	}
	
	private static Funcionario[] RecuperarTrabalhadores() throws IOException {
		Funcionario[] funcionarios = new Funcionario[1000];
		FileInputStream file =new FileInputStream("funcionarios.bin");
		ObjectInputStream objs = new ObjectInputStream(file);
		
		try {
			for(int i=0; i<1000;i++) {
				funcionarios[i] = (Funcionario)objs.readObject();
				}
			}
		catch(Exception e){
			System.out.println();			
			}			
		return funcionarios;
	}	
}

