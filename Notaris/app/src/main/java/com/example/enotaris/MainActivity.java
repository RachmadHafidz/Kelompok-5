package com.example.enotaris;



import android.content.Intent;
import android.os.Bundle;

import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;


import com.example.enotaris.client.Login;
import com.example.enotaris.client.RegisterActivity;
import com.example.enotaris.notaris.LoginNot;
import com.example.enotaris.notaris.RegNot;

public class MainActivity extends AppCompatActivity {

    Button login, signup, signup2,login2;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        // Assigning ID's to Button.

        signup = (Button) findViewById(R.id.signup);
        login = (Button) findViewById(R.id.login);
        signup2 = (Button) findViewById(R.id.signup2);
        login2 = (Button) findViewById(R.id.login2);


        //button login notaris
        login2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, Login.class);

                startActivity(intent);

            }
        });

        signup2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, RegisterActivity.class);

                startActivity(intent);

            }
        });


        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, LoginNot.class);

                startActivity(intent);

            }
        });

        signup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, RegNot.class);

                startActivity(intent);

            }
        });


    }
}
