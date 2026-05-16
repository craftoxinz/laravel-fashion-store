import React from 'react';
import styles from './ProductCard.module.css';

interface Product {
    id: number;
    name: string;
    price: number | string;
    image: string;
    category?: string;
    description?: string;
}

interface ProductCardProps {
    product: Product;
}

export default function ProductCard({ product }: ProductCardProps) {
    const formatCurrency = (value: number | string) => {
        const numericValue =
            typeof value === 'string' ? parseFloat(value) : value;

        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0,
        })
            .format(numericValue)
            .replace('IDR', 'Rp');
    };

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
                <p className={styles.productPrice}>
                    {formatCurrency(product.price)}
                </p>
            </div>
        </div>
    );
}
