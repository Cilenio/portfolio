import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class ler {

	public static void main(String[] args)throws IOException {
		int anoNas, idade;
		FileReader ler = new FileReader("salarios.txt");
		BufferedReader ficheiro = new BufferedReader(ler);
		Scanner k = new Scanner(System.in);
		String[] dados;	
		String linha = ficheiro.readLine();
		linha = ficheiro.readLine();
		
		while(linha != null && !linha.equals("")) {
		dados = linha.split("=");
		
		String nomeDoTrabalhador = dados[0];
		double horasTrabalhadas  = Double.parseDouble(dados[1]);
		double horasAtraso  = Double.parseDouble(dados[2]);
		double salarioDiario  = Double.parseDouble(dados[3]);
		
		double salarioo =horasTrabalhadas * salarioDiario /8 - (horasAtraso * salarioDiario/8)*0.75; 
		System.out.println("Nome: "+nomeDoTrabalhador+"  Salario: "+salarioo+" MZN ");
		
		linha = ficheiro.readLine();
			
		}
		ficheiro.close();
		ler.close();
		

	}

}
