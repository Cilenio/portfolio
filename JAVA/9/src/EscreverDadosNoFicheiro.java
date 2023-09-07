import java.io.BufferedWriter;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Scanner;

public class EscreverDadosNoFicheiro {

	public static void main(String[] args)throws IOException {

		FileWriter escrever = new FileWriter("testo.txt", true);
		BufferedWriter ficheiro = new BufferedWriter(escrever);
		Scanner k = new Scanner(System.in);
		
		ficheiro.newLine();
		System.out.println("Digite o nome: ");
		String nome = k.next();
		ficheiro.write(nome);
		
		ficheiro.close();
		escrever.close();

	}

}
