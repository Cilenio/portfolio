import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.Scanner;

public class ficha7ex2 {

	public static void main(String[] args)throws IOException {
	 double Max, Min, Mes, tMaxs = 0, tMins = 0, meses = 0, mediaTMax = 0, mediaTMin = 0;
		FileReader ler = new FileReader("temperaturas.txt");
		BufferedReader ficheiro = new BufferedReader(ler);
		Scanner k = new Scanner(System.in);
		String[] dados;	
		String linha = ficheiro.readLine();
		linha = ficheiro.readLine();
		
		while(linha != null && !linha.equals("")) {
			dados = linha.split("<>");
			
			Mes = Double.parseDouble(dados[0]);
			Max  = Double.parseDouble(dados[1]);
			Min  = Double.parseDouble(dados[2]);						
			linha = ficheiro.readLine();
			
			meses ++;
			tMaxs += Max;
			tMins += Min;
			}
		
		System.out.println("Meses: "+meses);
		System.out.println("Media das Minimas: "+MediaDasMinimas(mediaTMin, meses, tMins));
		System.out.println("Media das Maximas: "+MediaDasMaximas(mediaTMax, meses, tMaxs));
	}
	
	public static double MediaDasMaximas(double mediaTMax, double meses, double tMaxs) {
	return mediaTMax= tMaxs/meses;
	}
	public static double MediaDasMinimas(double mediaTMin, double meses, double tMins) {
		return mediaTMin= tMins/meses;
	}
	public static double MaximasMaximas() {
	return 0;	
	}
	public static double MinimasMinimas() {
		return 0;
	}

}












