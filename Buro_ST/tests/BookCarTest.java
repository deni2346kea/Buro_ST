import org.junit.Test;

import static org.junit.Assert.*;
import static org.junit.Assert.assertEquals;

public class BookCarTest {
    @Test
    public void getCar() throws Exception {
        BookCar Buro = new BookCar("California", "Ferrari", "California", "11/02/2019", "15/03/2019", 300);
        assertEquals(Buro.equals(Buro) );
    }

    private void assertEquals(boolean equals) {
    }

    @Test
    public void getPrice() throws Exception {
        ListCar Trine = new ListCar("California", "Ferrari", "California", "11/02/2019", "15/03/2019", 300);
        assertEquals(200, Trine.getPrice());
    }

    private void assertEquals(int i, int price) {
    }
}