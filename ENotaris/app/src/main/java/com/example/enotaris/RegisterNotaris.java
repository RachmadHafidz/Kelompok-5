package com.example.enotaris;

import android.app.ProgressDialog;
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

public class RegisterNotaris extends AppCompatActivity {
    EditText emailnot,passwordnot,namanot,telpnot, sk, alamat;
    Button daftar;
    RequestQueue requestQueue;
    String NamanotHolder,TelpnotHolder,EmailnotHolder,PasswordnotHolder, SkHolder, AlamatHolder;
    ProgressDialog progressDialog;
    String HttpUrl="http://192.168.1.5/volley/daftarr.php";
    Boolean CheckEditText;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.register_notaris);

        emailnot=findViewById(R.id.emailnot);
        passwordnot=findViewById(R.id.passwordnot);
        namanot=findViewById(R.id.namanot);
        alamat=findViewById(R.id.alamat);
        telpnot=findViewById(R.id.telpnot);
        sk=findViewById(R.id.sk);
        daftar=findViewById(R.id.daftar);
        requestQueue = Volley.newRequestQueue(RegisterNotaris.this);
        progressDialog= new ProgressDialog(RegisterNotaris.this);

        daftar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CheckEditTextIsEmptyOrNot();
                if (CheckEditText){
                    UserRegistration();
                }else {
                    Toast.makeText(RegisterNotaris.this,"Penuhi form",Toast.LENGTH_LONG).show();
                }
            }
        });

    }

    public void UserRegistration() {
        progressDialog.setMessage("sedang proses masukkan data");
        progressDialog.show();
        StringRequest stringRequest =new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {
                        progressDialog.dismiss();

                        Toast.makeText(RegisterNotaris.this, ServerResponse, Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();

                        Toast.makeText(RegisterNotaris.this,volleyError.toString(),Toast.LENGTH_LONG).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams() {
                Map<String,String> params = new HashMap<>();
                params.put("namanot",NamanotHolder);
                params.put("telp",TelpnotHolder);
                params.put("emailnot",EmailnotHolder);
                params.put("alamat_kantor",AlamatHolder);
                params.put("no_sk",SkHolder);
                params.put("passwordnot",PasswordnotHolder);
                return params;
            }
        };
        RequestQueue requestQueue= Volley.newRequestQueue(RegisterNotaris.this);
        requestQueue.add(stringRequest);
    }

    public void CheckEditTextIsEmptyOrNot() {
        NamanotHolder=namanot.getText().toString().trim();
        TelpnotHolder=telpnot.getText().toString().trim();
        EmailnotHolder=emailnot.getText().toString().trim();
        AlamatHolder=alamat.getText().toString().trim();
        SkHolder=sk.getText().toString().trim();
        PasswordnotHolder=passwordnot.getText().toString().trim();
        if (TextUtils.isEmpty(NamanotHolder) || TextUtils.isEmpty(TelpnotHolder) || TextUtils.isEmpty(EmailnotHolder) || TextUtils.isEmpty(AlamatHolder) || TextUtils.isEmpty(SkHolder) || TextUtils.isEmpty(PasswordnotHolder)){
            CheckEditText=false;
        }
        else {
            CheckEditText=true;
        }
    }
}
