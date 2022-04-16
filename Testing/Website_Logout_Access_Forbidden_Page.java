import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;

public class Website_Logout_Access_Forbidden_Page {

	public static void main(String[] args) {
		
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\aadap\\eclipse\\chromedriver.exe");
		
		
		ChromeDriver driver = new ChromeDriver();
		driver.get("https://web.ics.purdue.edu/~g1120478/");
		
		driver.findElement(By.id("username")).sendKeys("authDemonstration");
		driver.findElement(By.id("password")).sendKeys("12345");
		driver.findElement(By.xpath("//*[@id=\"submit\"]")).click();
		
		//Logged In to Website
		
		//Logout
		driver.findElement(By.xpath("/html/body/nav/a[7]")).click();
		driver.findElement(By.xpath("/html/body/nav/a[6]")).click();
		
		//Try to access restricted page
		driver.get("https://web.ics.purdue.edu/~g1120478/Home_1.php");
		
		String u = driver.getCurrentUrl();
		if (!u.equals("https://web.ics.purdue.edu/~g1120478/Home_1.php")) {
			System.out.println("Test Case Passed");
		}
		else {
			System.out.println("Test Case Failed");
		}
		driver.close();
	}

}
