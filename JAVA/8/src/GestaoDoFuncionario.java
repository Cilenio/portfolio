import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

public class GestaoDoFuncionario {

	public static void main(String[] args) throws IOException {
		Scanner k= new Scanner(System.in);
		MetodosDoFuncionario metodos = new MetodosDoFuncionario();
		
		int opc;
		do{
			System.out.println("[1] para adicionar Funcionario");
			System.out.println("[2] para listar Funcionario");
			System.out.println("[3] para actualizar Funcionario");
			System.out.println("[4] para remover Funcionario");
			opc =k.nextInt();
			
			switch (opc){
			case 1: metodos.adicionarFuncionarioNoFicheiro();;break;		   
			case 2: metodos.listarEstudante();break;
			case 3: metodos.actualizarFuncionario(null);break;
			case 4: metodos.removerestudante(null);break;
			default : System.out.println("ooo");			
			}
			
		}while(opc!=0);

		}

	}


