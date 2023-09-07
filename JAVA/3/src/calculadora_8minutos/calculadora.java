package calculadora_8minutos;

import java.util.Scanner;

public class calculadora {
public static int snumero, numero;
	
	public static void main(String[] args) {
		Scanner k = new Scanner(System.in);
		System.out.println("Digite o numero");
	     numero = k.nextInt();
	     System.out.println("Digite o segundo numero");
		snumero = k.nextInt();
		
		

	}

	public static  void adicao() {
		System.out.println(numero+snumero);
		
	}
}
