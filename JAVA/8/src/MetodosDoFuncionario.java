import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class MetodosDoFuncionario {
	static Scanner k= new Scanner(System.in);
	
	public static void adicionarFuncionarioNoFicheiro() throws IOException {
		FileWriter escrever = new FileWriter("funcionarios.txt", true);
		BufferedWriter criar = new BufferedWriter(escrever);
		
		System.out.println("Digitee o nome");String nome=k.next();
		System.out.println("Digite o codigo");int codigo=k.nextInt();
		System.out.println("Digite o quantidadeDeDias");int quantidadeDeDias=k.nextInt();
		System.out.println("Digite o valorFixoDiario");int valorFixoDiario=k.nextInt();
		
		Funcionario estudante =new Funcionario(nome, codigo, quantidadeDeDias, valorFixoDiario);
		escrever.write(estudante.toString());
		criar.newLine();
		
		criar.close();
		escrever.close();
		
	}
	
	public static ArrayList<Funcionario> listaDoFuncionario() throws IOException{
		
		ArrayList<Funcionario> estudantes = new ArrayList<Funcionario>();
		FileReader abrir = new FileReader("funcionarios.txt");
		BufferedReader ler = new BufferedReader(abrir);
		
		String linha=ler.readLine();
		
		String ElementosDaLinha[];
		
		while(linha!=null&&!linha.isEmpty()){
			ElementosDaLinha = linha.split("-");
				
		String nome = ElementosDaLinha[0];
		int codigo=Integer.parseInt(ElementosDaLinha[1]);
		double quantidadeDeDias=Double.parseDouble(ElementosDaLinha[2]);
		double valorFixoDiario=Double.parseDouble(ElementosDaLinha[3]);
		
		Funcionario estudante =new Funcionario(nome, codigo, quantidadeDeDias, valorFixoDiario);
		estudantes.add(estudante);
		
		linha=ler.readLine();
			}
		
		ler.close();
		abrir.close();
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
		
		FileWriter criar = new FileWriter("funcionarios.txt");
		BufferedWriter escrever = new BufferedWriter(criar);
		for (int i=0; i<estudantes.size(); i++){
			escrever.write(estudantes.get(i).toString());
			escrever.newLine();
			}
		escrever.close();
		criar.close();
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
		FileWriter criar = new FileWriter("funcionarios.txt");
		BufferedWriter escrever = new BufferedWriter(criar);
	
		for (int i=0; i<estudantes.size(); i++){
			Funcionario estudante=estudantes.get(i);
			escrever.write(estudantes.get(i).toString());
			escrever.newLine();
	}
		escrever.close();
		criar.close();
	}
	


}
