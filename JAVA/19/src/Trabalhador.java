import java.io.Serializable;

public class Trabalhador implements Serializable{
	private int codigo;
	private String nome;
	private double salario;
	public Trabalhador(int codigo, String nome, double salario) {
		super();
		this.codigo=codigo;
		this.nome=nome;
		this.salario=salario;
	}
	public String toString() {
		return codigo+"-"+nome+"-"+salario;		
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
	public double getSalario() {
		return salario;
	}
	public void setSalario(double salario) {
		this.salario = salario;
	}
	

}
