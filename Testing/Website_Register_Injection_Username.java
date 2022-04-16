import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;

public class Website_Register_Injection_Username {
	public static void main(String[] args) {
		
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\aadap\\eclipse\\chromedriver.exe");
		
		
		ChromeDriver driver = new ChromeDriver();
		driver.get("https://web.ics.purdue.edu/~g1120478/register_1.html");
	    
		driver.findElement(By.id("username")).sendKeys(" ' or 1=1 --");
		driver.findElement(By.id("password")).sendKeys("12345");
		driver.findElement(By.id("email")).sendKeys("test@asd");
		driver.findElement(By.xpath("/html/body/div/form/input[4]")).click();
		String u = driver.getCurrentUrl();
		if (!u.equals("https://web.ics.purdue.edu/~g1120478/index.html")) {
			System.out.println("Test Case Passed");
		}
		else {
			System.out.println("Test Case Failed");
		}
		driver.close();
	}
}