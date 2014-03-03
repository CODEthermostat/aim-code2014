
 
import java.io.BufferedReader;
import java.sql.*;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.sql.DriverManager;
import java.util.ArrayList;
 
public class ReadCVS {
 
  public static void main(String[] args) {
 
	ReadCVS obj = new ReadCVS();
	obj.run();
	connectDB();
 
  }
  
  public void print_curr_line_parsed(String[] strArrToPtr){
	  System.out.println("*********start");
	  for(int i=0; i<strArrToPtr.length; i++){
	  System.out.println(strArrToPtr[i]);
	  }
	  System.out.println("------------------end");
  }
  
  public void print_array_of_rows_final_output(ArrayList<String[]> rows){
	  System.out.println("****starting print array of rows");
	  for(int i=0; i<rows.size(); i++){
		  for(int j=0; j<rows.get(i).length; j++){
			  System.out.println("^^^^start of row^^^");
			  System.out.println((rows.get(i))[j]);
			  System.out.println("^^^end of row^^^");
		  	}
		  }
	  System.out.println("------end printing array of rows-----");
  }
 
  public static void connectDB(){
	  Connection c = null;
	    Statement stmt = null;
	    try {
	      Class.forName("org.sqlite.JDBC");
	      c = DriverManager.getConnection("jdbc:sqlite:production.sqlite");
	      System.out.println("Opened database successfully");

	      stmt = c.createStatement();
	      String sql = "CREATE TABLE PRODUCTS " +
	                   "(ID INT PRIMARY KEY     NOT NULL," +
	                   " LOWER           INT    NOT NULL, " + 
	                   " HIGHER            INT     NOT NULL, " + 
	                   " PRODUCTS        TEXT     NOT NULL, " + 
	                   " VALUE         INT     NOT NULL)"; 
	      stmt.executeUpdate(sql);
	      stmt.close();
	      c.close();
	    } catch ( Exception e ) {
	      System.err.println( e.getClass().getName() + ": " + e.getMessage() );
	      System.exit(0);
	    }
	    System.out.println("Table created successfully");
  }
  public void run() {
 
	String csvFile = "/Users/Sahiti/workspace/AIM/src/products/02030026-eng.csv";
	BufferedReader br = null;
	String line = "";
	String cvsSplitByComma = ",";
	String splitByAbd = "and";
	String splitByAllClasses = "All classes";
	String splitByLessThan = "Less than";
	String splitByAndOver = "and over";
	String splitBySpace = " ";
	ArrayList<String[]> rows = new ArrayList<String[]>();
	int rowCount = 0;
 
	try {
 
		br = new BufferedReader(new FileReader(csvFile));
		while ((line = br.readLine()) != null) {
 
		        // use comma as separator
			String[] curr_line = line.split("\"?(,|$)(?=(([^\"]*\"){2})*[^\"]*$) *\"?");
			//String[] curr_line = line.split(cvsSplitByComma);
			String[] curr_line_parsed = new String[4];
			String ageGroup = curr_line[3];
			//String[] curr_line_parsed = {lowerAge, HigherAge, product, value};
			
		
//			String A = "Less than ";
//			String B = " years";
//			String C = " to ";
//			String D = "and over";
//			String E = " to and over";
			
			if(rowCount<=935){//All classes
				//String[] ageGroupArray = ageGroup.split("/^(A|B|C|D|E)/", 3);
				curr_line_parsed[0] = "0";
				curr_line_parsed[1] = "150";
				print_curr_line_parsed(curr_line_parsed);

			}
			if((rowCount>935 )&(rowCount<=1869)){//Less than 30 years
				curr_line_parsed[0] = "0";
				curr_line_parsed[1] = "30";

			}
			if((rowCount>1869 )&(rowCount<=4671)){//30 to 39 years
				String[] temp = line.split(splitBySpace);
				curr_line_parsed[0] = temp[0];
				curr_line_parsed[1] = temp[2];

			}
			if((rowCount>4671 )&(rowCount<=5605)){//65 years and over
				curr_line_parsed[0] = "65";
				curr_line_parsed[1] = "150";
			}
			
			curr_line_parsed[2] = curr_line[4];
			curr_line_parsed[3] = curr_line[7];
			
//			System.out.println("Return Value :" );
//		      for (String retval: ageGroupArray){
//		         System.out.println("ageGroup:  " + retval );
//		      }
			
//			System.out.println();
//			int lowBoundAge ;
//			int upperBoundAge ;
//			System.out.println("row# " + rowCount + " ,  age_groups  " + curr_line[3]
//                                 + " , product=  " + curr_line[4] +
//                                 " , value=  " + curr_line[7] );//debuging
			
			rows.add(curr_line_parsed);
			
			for(int i=0; i<curr_line_parsed.length;i++ ){
				//insert the rows to sql here
			}
			
			print_curr_line_parsed(curr_line_parsed);
			
			rowCount++;
 
		}
		//print_array_of_rows_final_output(rows);
 
	} catch (FileNotFoundException e) {
		e.printStackTrace();
	} catch (IOException e) {
		e.printStackTrace();
	} finally {
		if (br != null) {
			try {
				br.close();
			} catch (IOException e) {
				e.printStackTrace();
			}
		}
	}
 
	System.out.println("Done");
  }
 
}