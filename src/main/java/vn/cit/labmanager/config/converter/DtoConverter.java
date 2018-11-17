package vn.cit.labmanager.config.converter;

public interface DtoConverter<T, U> {
	U toDto(T original);
	T toOriginal(U dto);
}
