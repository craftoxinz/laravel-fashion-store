import React from 'react';
import styles from './ProductCard.module.css';

interface Product {
    id: number;
    name: string;
    price: string;
    image: string;
}

export default function ProductCard({ product }: { product: Product }) {
    return (
        <div className={styles.productCard}>
            <div className={styles.imageWrapper}>
                <img
                    src={product.image}
                    alt={product.name}
                    className={styles.image}
                />
            </div>
            <div className={styles.productDetails}>
                <h3 className={styles.productName}>{product.name}</h3>
                <p className={styles.productPrice}>{product.price}</p>
            </div>
        </div>
    );
}
