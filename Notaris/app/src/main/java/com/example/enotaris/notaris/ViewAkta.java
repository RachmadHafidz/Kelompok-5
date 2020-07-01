package com.example.enotaris.notaris;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.enotaris.R;

import java.util.ArrayList;
import java.util.List;

public class ViewAkta extends RecyclerView.Adapter<ViewAkta.ViewHolder> {
    private Context context;
    private List<Akta> listAkta;

    public ViewAkta(Context context) {
        this.context = context;
        listAkta = new ArrayList<>();
    }

    public void setListAkta(List<Akta> listAkta) {
        this.listAkta = listAkta;
        notifyDataSetChanged();
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(context).inflate(R.layout.akta, viewGroup, false);
        return new ViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {
        Akta m = listAkta.get(i);


        viewHolder.tv_nama_akta.setText(m.getNamaa());
        viewHolder.tv_jenis_akta.setText(m.getJeniss());
        viewHolder.tv_tgl.setText(m.getKet());
        viewHolder.tv_ket.setText(m.getCat());
        viewHolder.tv_cat.setText(m.getAk());
        viewHolder.tv_ak.setText(m.getLap());
        viewHolder.tv_lap.setText(String.valueOf(m.getTgl()));
    }

    @Override
    public int getItemCount() {
        return listAkta.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        private TextView  tv_nama_akta, tv_jenis_akta, tv_tgl, tv_ket, tv_cat, tv_ak, tv_lap;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            tv_nama_akta = itemView.findViewById(R.id.tv_nama_akta);
            tv_jenis_akta = itemView.findViewById(R.id.tv_jenis_akta);
            tv_tgl = itemView.findViewById(R.id.tv_tgl);
            tv_ket = itemView.findViewById(R.id.tv_ket);
            tv_cat = itemView.findViewById(R.id.tv_cat);
            tv_ak = itemView.findViewById(R.id.tv_akta);
            tv_lap = itemView.findViewById(R.id.tv_lap);
        }
    }
}

