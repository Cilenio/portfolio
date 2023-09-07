import java.io.IOException;
import java.io.Serializable;

public class Estudante {
	private int codigo;
	private String nome;
	private double teste1,teste2;
	
	
	
	public Estudante(int codigo,String nome, double teste1,double teste2 ) {
		super();
		this.nome=nome;
		this.codigo=codigo;
		this.teste1=teste1;
		this.teste2=teste2;
		
	}
	
	public int getCodigo() {
		return codigo;
	}
	public void setCodigo(int codigo) {
		this.codigo = codigo;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public double getTeste1() {
		return teste1;
	}
	public void setTeste1(double teste1) {
		this.teste1 = teste1;
	}
	public double getTeste2() {
		return teste2;
	}
	public void setTeste2(double teste2) {
		this.teste2 = teste2;
	}
	public double media(){
		return (teste1+teste2)/2;
	}
	public String Situacao(){
		String situacao= "";
		double media =media();
		if(media>=9.5){
			situacao = "Admitido";
		}
		else if(media>=13.5){
			situacao = "Admitido";
		}
		else{
			situacao="Excluido";
		}
		return situacao;		
	}
	
	public String toString() {
		return codigo+"-"+nome+"-"+teste1+"-"+teste2+"-"+media()+"-"+Situacao();
	}
}
