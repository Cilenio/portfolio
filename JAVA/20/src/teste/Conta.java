package teste;
import java.io.IOException;
import java.io.Serializable;

public class Conta implements Serializable{
	private int numero;
	private String nome;
	private int saldo;
	
	public Conta() {		
	}
	public Conta(String nome, int numero) {
		this.nome=nome;
		this.numero=numero;
		this.saldo=saldo;
	}
	public String toString() {
		return "Nome: "+ nome+" [Numero da Conta: "+numero+" [Saldo da Conta "+saldo;
	}
		
	public void depositar(int numero, int valor)throws IOException {
		this.saldo += valor+saldo;
		}
	public int getNumero() {
		return numero;
	}
	public void setNumero(int numero) {
		this.numero = numero;
	}
	public String getNome() {
		return nome;
	}
	public void setNome(String nome) {
		this.nome = nome;
	}
	public int getSaldo() {
		return saldo;
	}
	public void setSaldo(int saldo) {
		this.saldo = saldo;
	}
}

























