package com.example.enotaris;



import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {

    Button Login, Login2, signup, signup2;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        // Assigning ID's to Button.
        Login = (Button) findViewById(R.id.login);
        signup = (Button) findViewById(R.id.signup);
        Login2 = (Button) findViewById(R.id.login2);
        signup2 = (Button) findViewById(R.id.signup2);



        //button login notaris
        Login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, LoginNotaris.class);

                startActivity(intent);

            }
        });

        //button login client
        Login2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, LoginClient.class);

                startActivity(intent);

            }
        });

        //button daftar client
        signup2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, RegisterActivity.class);

                startActivity(intent);

            }
        });

        //button daftar notaris
        signup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(MainActivity.this, RegisterNotaris.class);

                startActivity(intent);

            }
        });
    }
}
