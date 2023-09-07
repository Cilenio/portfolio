package ex2;
import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class LerDadodNoFicheiro {
	
	public static void main(String[] args)throws IOException {
		int anoNas, idade;
		FileWriter escrever = new FileWriter("testo.txt", true);
		BufferedWriter ficheiro = new BufferedWriter(escrever);
		Scanner k = new Scanner(System.in);
	
		
		
		
		ficheiro.newLine();
		System.out.println("Digite o nome: ");
		String nome = k.next();
		System.out.println("Digite o ano de nascimento: ");
	    anoNas = k.nextInt();
		idade = 2022-anoNas;
		
		ficheiro.write(nome);
		ficheiro.write(" - ");
		ficheiro.write(anoNas+" ");
		ficheiro.write(" - ");
		ficheiro.write(idade+" ");
		ficheiro.close();
		escrever.close();

	}

}
