import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;


public class MetodosEstudante {
	Scanner k= new Scanner(System.in);
	
	public void CadastrarEstudante() throws IOException{
		FileWriter criar = new FileWriter("estudante.txt", true);
		BufferedWriter escrever = new BufferedWriter(criar);
		
		System.out.println("Digite o codigo "); int codigo=k.nextInt();
		System.out.println("Digitee o nome");String nome=k.next();
		System.out.println("Digite o teste 1");int teste1=k.nextInt();
		System.out.println("Digite o teste 2");int teste2=k.nextInt();
		
		Estudante estudante =new Estudante(codigo, nome, teste1, teste2);
		escrever.write(estudante.toString());
		escrever.newLine();
		
		escrever.close();z
		criar.close();
	}
	
	
	public ArrayList<Estudante> listaDeEstudantes() throws IOException{
		ArrayList<Estudante> estudantes = new ArrayList<Estudante>();
		FileReader abrir = new FileReader("estudante.txt");
		BufferedReader ler = new BufferedReader(abrir);
		String linha=ler.readLine();
		
		String ElementosDaLinha[];
		
		while(linha!=null&&!linha.isEmpty()){
			ElementosDaLinha=linha.split("-");
				
		int codigo=Integer.parseInt(ElementosDaLinha[0]);
		String nome=ElementosDaLinha[1];
		double teste1=Double.parseDouble(ElementosDaLinha[2]);
		double teste2=Double.parseDouble(ElementosDaLinha[3]);
		
		Estudante estudante =new Estudante(codigo, nome, teste1, teste2);
		estudantes.add(estudante);
		linha=ler.readLine();
			}
		ler.close();
		abrir.close();
		return estudantes;		
		}
		
	
	public void listarEstudante() throws IOException{	
		ArrayList<Estudante> estudantes = listaDeEstudantes();
		for (int i=0; i<estudantes.size(); i++){
			System.out.println(estudantes.get(i).toString());
		}
	}
	
	
	
	public ArrayList<Estudante> actualizarEstudantes() throws IOException{
		ArrayList<Estudante> estudantes = listaDeEstudantes();
		System.out.println("Digite o codigo "); int codigo=k.nextInt();
		for (int i=0; i<estudantes.size(); i++){
			Estudante estudante=estudantes.get(i);
			if(codigo==estudante.getCodigo()){
				System.out.println("Digitee o nome");String nome=k.next();
				System.out.println("Digite o teste 1");int teste1=k.nextInt();
				System.out.println("Digite o teste 2");int teste2=k.nextInt();
				estudante.setNome(nome);
				estudante.setCodigo(codigo);
				estudante.setTeste1(teste1);
				estudante.setTeste2(teste2);
				}
			}
		FileWriter criar = new FileWriter("estudante.txt");
		BufferedWriter escrever = new BufferedWriter(criar);
		for (int i=0; i<estudantes.size(); i++){
			escrever.write(estudantes.get(i).toString());	
			}
		escrever.close();
		criar.close();
		return estudantes;		
	}
	
	
	public void removerestudante() throws IOException{
		ArrayList<Estudante> estudantes = listaDeEstudantes();
		System.out.println("Digite o codigo "); int codigo=k.nextInt();
		for (int i=0; i<estudantes.size(); i++){
			Estudante estudante=estudantes.get(i);
			if(codigo==estudante.getCodigo()){
				estudantes.remove(estudante);
			}
		}
		FileWriter criar = new FileWriter("estudante.txt");
		BufferedWriter escrever = new BufferedWriter(criar);
	
		for (int i=0; i<estudantes.size(); i++){
			Estudante estudante=estudantes.get(i);
			escrever.write(estudantes.get(i).toString());
			escrever.newLine();
	}
		escrever.close();
		criar.close();
	}

}
	