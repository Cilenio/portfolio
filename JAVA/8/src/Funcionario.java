
public class Funcionario {
	public String nome;
	public int codigo;
	public double quntidadeDeDias;
	public double valorFixoDiario;
	
	public Funcionario(String nome, int codigo, double quantidadeDeDias, double valorFixoDiario) {
		this.nome=nome;
		this.codigo=codigo;
		this.quntidadeDeDias=quantidadeDeDias;
		this.valorFixoDiario=valorFixoDiario;
	}
	public double calcularSalario() {
		return quntidadeDeDias*valorFixoDiario;
	}
	public String toString() {
		return nome+"-"+codigo+"-"+quntidadeDeDias+"-"+valorFixoDiario+"-"+"Salario: "+calcularSalario();
		
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	
	public int getCodigo() {
		return codigo;
	}
	public void setCodigo(int codigo) {
		this.codigo = codigo;
	}
	public double getQuntidadeDeDias() {
		return quntidadeDeDias;
	}
	public void setQuntidadeDeDias(double quantidadeDeDias) {
		this.quntidadeDeDias = quantidadeDeDias;
	}
	public double getValorFixoDiario() {
		return valorFixoDiario;
	}
	public void setValorFixoDiario(double valorFixoDiario2) {
		this.valorFixoDiario = valorFixoDiario2;
	}

}
