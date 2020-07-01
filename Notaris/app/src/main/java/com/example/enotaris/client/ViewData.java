package com.example.enotaris.client;

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

public class ViewData extends RecyclerView.Adapter<ViewData.ViewHolder> {
    private Context context;
    private List<Notaris> listNotaris;

    public ViewData(Context context) {
        this.context = context;
        listNotaris = new ArrayList<>();
    }

    public void setListMahasiswa(List<Notaris> listMahasiswa) {
        this.listNotaris = listMahasiswa;
        notifyDataSetChanged();
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View v = LayoutInflater.from(context).inflate(R.layout.item_list, viewGroup, false);
        return new ViewHolder(v);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, int i) {
        Notaris m = listNotaris.get(i);


        viewHolder.tvNama.setText(m.getNama());
        viewHolder.tvAlamat.setText(m.getAlamat());
        viewHolder.tvBiaya.setText(String.valueOf(m.getBiaya()));
    }

    @Override
    public int getItemCount() {
        return listNotaris.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        private TextView  tvNama, tvAlamat, tvBiaya;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);

            tvNama = itemView.findViewById(R.id.tv_nama);
            tvAlamat = itemView.findViewById(R.id.tv_alamat);
            tvBiaya = itemView.findViewById(R.id.tv_biaya);
        }
    }
}
